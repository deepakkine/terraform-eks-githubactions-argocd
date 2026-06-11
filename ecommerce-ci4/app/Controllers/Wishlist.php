<?php

namespace App\Controllers;

use App\Models\WishlistModel;

class Wishlist extends BaseController
{

    public function index()
    {
        $userId = session()->get('user')['id'];

        $model = new \App\Models\WishlistModel();

        $data['items'] = $model
            ->select('wishlists.*, products.name, products.price, products.image')
            ->join('products', 'products.id = wishlists.product_id')
            ->where('wishlists.user_id', $userId)
            ->findAll();

        return view('wishlist/index', $data);
    }

    public function toggle($productId)
    {
        if (!session()->get('user')) {
            return $this->response->setJSON(['status' => 'login_required']);
        }

        $userId = session()->get('user')['id'];

        $model = new WishlistModel();

        $exists = $model
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($exists) {
            // Remove
            $model->where('id', $exists['id'])->delete();

            return $this->response->setJSON(['status' => 'removed']);
        } else {
            // Add
            $model->insert([
                'user_id' => $userId,
                'product_id' => $productId
            ]);

            return $this->response->setJSON(['status' => 'added']);
        }
    }

    public function getUserWishlist()
    {
        $user = session()->get('user');

        // 🔥 VERY IMPORTANT (fix after logout/login)
        if (!$user) {
            return $this->response->setJSON([]);
        }

        $userId = $user['id'];

        $model = new WishlistModel();

        $items = $model
            ->where('user_id', $userId)
            ->findAll();

        return $this->response->setJSON(array_column($items, 'product_id'));
    }

    public function list()
    {
        if (!session()->get('user')) {
            return $this->response->setJSON([]);
        }

        $wishlistModel = new \App\Models\WishlistModel();

        $items = $wishlistModel
            ->where('user_id', session()->get('user')['id'])
            ->findAll();

        // ✅ RETURN ONLY PRODUCT IDs
        $ids = array_column($items, 'product_id');

        return $this->response->setJSON($ids);
    }
}
