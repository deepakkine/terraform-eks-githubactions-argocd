<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Order extends BaseController
{
    // Customer order list
    public function index()
    {
        $userId = session()->get('user')['id'];

        $model = new OrderModel();

        $data['orders'] = $model
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('order/index', $data);
    }

    // Order details
    public function view($id)
    {
        $userId = session()->get('user')['id'];

        $orderModel = new OrderModel();
        $itemModel = new OrderItemModel();

        // ✅ SECURITY: Only fetch order of logged-in user
        $order = $orderModel
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$order) {
            return redirect()->to('/orders')
                ->with('error', 'Order not found');
        }

        $data['order'] = $order;

        // ✅ NO JOIN (use snapshot data)
        $data['items'] = $itemModel
            ->where('order_id', $id)
            ->findAll();

        return view('order/view', $data);
    }
}
