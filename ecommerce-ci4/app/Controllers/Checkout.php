<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\AddressModel;

class Checkout extends BaseController
{
    // Show checkout page
    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->to('/login');
        }

        $cartModel = new CartModel();

        $cart = $cartModel
            ->select('
        cart.*, 
        products.name,

        product_variants.price,
        product_variants.discount,
        product_variants.color,
        product_variants.size,

        product_images.image as variant_image
    ')
            ->join('products', 'products.id = cart.product_id')
            ->join('product_variants', 'product_variants.id = cart.variant_id')
            ->join('product_images', 'product_images.variant_id = product_variants.id', 'left')
            ->where('cart.user_id', session()->get('user')['id'])
            ->groupBy('cart.id')
            ->findAll();

        return view('checkout/index', ['cart' => $cart]);
    }

    // Place order
    public function placeOrder()
    {
        if (!session()->get('user')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user')['id'];

        $cartModel = new CartModel();
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();
        $addressModel = new AddressModel();

        // 🔥 GET CART (VARIANT BASED)
        $cart = $cartModel
            ->select('
        cart.*,

        product_variants.price,
        product_variants.discount,
        product_variants.stock,
        product_variants.color,
        product_variants.size,

        product_images.image as variant_image,

        products.name
    ')
            ->join('product_variants', 'product_variants.id = cart.variant_id')
            ->join('products', 'products.id = cart.product_id')
            ->join('product_images', 'product_images.variant_id = product_variants.id', 'left')
            ->where('cart.user_id', $userId)
            ->groupBy('cart.id')
            ->findAll();

        // ✅ CHECK EMPTY CART FIRST (MOVE UP)
        if (!$cart) {
            return redirect()->to('/cart')->with('error', 'Cart empty');
        }

        // 🔥 STOCK VALIDATION
        foreach ($cart as $item) {

            if ($item['qty'] > $item['stock']) {
                return redirect()->to('/cart')
                    ->with('error', $item['name'] . ' has only ' . $item['stock'] . ' items left');
            }
        }

        // ✅ SAVE ADDRESS
        $addressModel->insert([
            'user_id' => $userId,
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'pincode' => $this->request->getPost('pincode'),
        ]);

        // 🔥 CALCULATE TOTAL (VARIANT + DISCOUNT)
        $total = 0;

        foreach ($cart as $item) {

            $price = $item['price'];
            $discount = $item['discount'];

            $final = $price;

            if ($discount > 0) {
                $final = $price - ($price * $discount / 100);
            }

            $total += $final * $item['qty'];
        }

        // 🔥 APPLY COUPON
        $coupon = session()->get('coupon');
        $couponDiscount = $coupon['discount'] ?? 0;

        $finalTotal = $total - $couponDiscount;

        // 🔥 CREATE ORDER
        $orderId = $orderModel->insert([
            'user_id' => $userId,
            'total' => $finalTotal,
            'status' => 'placed',

            // 🔥 FIX: STORE ADDRESS IN ORDER TABLE
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'pincode' => $this->request->getPost('pincode'),
        ]);

        // 🔥 SAVE ORDER ITEMS (WITH VARIANT DATA)
        foreach ($cart as $item) {

            $orderItemModel->insert([
                'order_id' => $orderId,
                'product_id' => $item['product_id'],
                'variant_id' => $item['variant_id'],
                'qty' => $item['qty'],
                'price' => $item['price'],

                // 🔥 SNAPSHOT DATA (IMPORTANT)
                'product_name' => $item['name'],
                'variant_color' => $item['color'],
                'variant_size' => $item['size'],

                // 🔥 THIS FIXES YOUR IMAGE ISSUE
                'product_image' => $item['variant_image'] ?? null
            ]);
        }

        // 🔥 REDUCE STOCK
        $variantModel = new \App\Models\ProductVariantModel();

        foreach ($cart as $item) {

            $variantModel->set('stock', 'stock - ' . (int)$item['qty'], false)
                ->where('id', $item['variant_id'])
                ->update();
        }

        // 🔥 CLEAR CART
        $cartModel->where('user_id', $userId)->delete();

        // 🔥 UPDATE COUPON USAGE
        $couponSession = session()->get('coupon');

        if ($couponSession) {
            $couponModel = new \App\Models\CouponModel();

            $couponModel->where('code', $couponSession['code'])
                ->set('used_count', 'used_count + 1', false)
                ->update();
        }

        // 🔥 CLEAR COUPON
        session()->remove('coupon');

        return redirect()->to('/')
            ->with('success', 'Order placed successfully');
    }
}
