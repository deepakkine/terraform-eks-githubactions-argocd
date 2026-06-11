<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;

class Cart extends BaseController
{
    // Add product to cart (DB based)
    public function add($variantId)
    {
        if (!session()->get('user')) {
            return redirect()->to('/login')->with('error', 'Login required');
        }

        $userId = session()->get('user')['id'];

        $cartModel = new CartModel();
        $variantModel = new \App\Models\ProductVariantModel();

        // 🔥 GET VARIANT
        $variant = $variantModel->find($variantId);

        if (!$variant) {
            return redirect()->back()->with('error', 'Variant not found');
        }

        // 🔥 STOCK CHECK (IMPORTANT - place here)
        if ($variant['stock'] <= 0) {
            return redirect()->back()->with('error', 'Out of stock');
        }

        // 🔥 CHECK IF ALREADY IN CART
        $existing = $cartModel
            ->where('user_id', $userId)
            ->where('variant_id', $variantId)
            ->first();

        if ($existing) {
            $cartModel->update($existing['id'], [
                'qty' => $existing['qty'] + 1
            ]);
        } else {
            $cartModel->insert([
                'user_id' => $userId,
                'variant_id' => $variantId,
                'product_id' => $variant['product_id'], // optional (safe)
                'qty' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Added to cart');
    }

    // Show cart
    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->to('/login')->with('error', 'Login required');
        }

        $userId = session()->get('user')['id'];

        $cartModel = new CartModel();

        $data['cart'] = $cartModel
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

            // 🔥 IMPORTANT JOIN
            ->join('product_images', 'product_images.variant_id = product_variants.id', 'left')

            ->where('cart.user_id', $userId)

            // 🔥 VERY IMPORTANT → get only ONE image per variant
            ->groupBy('cart.id')

            ->findAll();

        return view('cart/index', $data);
    }

    // Remove item
    public function remove($id)
    {
        $cartModel = new CartModel();
        $cartModel->delete($id);

        return redirect()->back()->with('success', 'Item removed');
    }

    // Update qty
    public function update()
    {
        $cartModel = new CartModel();
        $variantModel = new \App\Models\ProductVariantModel();

        foreach ($this->request->getPost('qty') as $id => $qty) {

            $cartItem = $cartModel->find($id);

            $variant = $variantModel->find($cartItem['variant_id']);

            // 🔥 STOCK CHECK
            if ($qty > $variant['stock']) {
                return redirect()->back()->with('error', 'Stock limit exceeded');
            }

            if ($qty <= 0) {
                $cartModel->delete($id);
            } else {
                $cartModel->update($id, ['qty' => $qty]);
            }
        }

        return redirect()->to('/cart')->with('success', 'Cart updated');
    }

    public function count()
    {
        if (!session()->get('user')) {
            return $this->response->setJSON(['count' => 0]);
        }

        $cartModel = new \App\Models\CartModel();

        $count = $cartModel
            ->where('user_id', session()->get('user')['id'])
            ->countAllResults();

        return $this->response->setJSON(['count' => $count]);
    }


    public function applyCoupon()
    {
        $code = $this->request->getPost('coupon');

        $couponModel = new \App\Models\CouponModel();


        $coupon = $couponModel
            ->where('code', $code)
            ->where('status', 1)
            ->first();

        if (!$coupon) {
            return redirect()->back()->with('error', 'Invalid coupon');
        }


        // ✅ Usage limit check
        if ($coupon['usage_limit'] && $coupon['used_count'] >= $coupon['usage_limit']) {
            return redirect()->back()->with('error', 'Coupon usage limit reached');
        }

        // Expiry check
        if ($coupon['expires_at'] && strtotime($coupon['expires_at']) < time()) {
            return redirect()->back()->with('error', 'Coupon expired');
        }

        $usageModel = new \App\Models\CouponUsageModel();

        $alreadyUsed = $usageModel
            ->where('user_id', session()->get('user')['id'])
            ->where('coupon_id', $coupon['id'])
            ->first();

        if ($alreadyUsed) {
            return redirect()->back()->with('error', 'You already used this coupon');
        }


        // Cart total
        $cartModel = new \App\Models\CartModel();
        $items = $cartModel
            ->join('product_variants', 'product_variants.id = cart.variant_id')
            ->where('user_id', session()->get('user')['id'])
            ->findAll();

        $total = 0;

        foreach ($items as $item) {
            $price = $item['price'];
            $discount = $item['discount'];

            $final = $price;

            if ($discount > 0) {
                $final = $price - ($price * $discount / 100);
            }

            $total += $final * $item['qty'];
        }

        // Min amount check
        if ($total < $coupon['min_amount']) {
            return redirect()->back()->with('error', 'Minimum cart value not met');
        }

        // Calculate discount
        $discountAmount = 0;

        if ($coupon['type'] == 'percent') {
            $discountAmount = ($total * $coupon['value']) / 100;

            if ($coupon['max_discount']) {
                $discountAmount = min($discountAmount, $coupon['max_discount']);
            }
        } else {
            $discountAmount = $coupon['value'];
        }

        // Save in session
        session()->set('coupon', [
            'id' => $coupon['id'],
            'code' => $coupon['code'],
            'discount' => $discountAmount
        ]);



        return redirect()->back()->with('success', 'Coupon applied');
    }

    public function removeCoupon()
    {
        session()->remove('coupon');

        return redirect()->back()->with('success', 'Coupon removed');
    }
}
