<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Order extends BaseController
{
    // All orders
    public function index()
    {
        $model = new OrderModel();

        $data['orders'] = $model
            ->select('orders.*, users.name as user_name')
            ->join('users', 'users.id = orders.user_id', 'left')
            ->orderBy('orders.id', 'DESC')
            ->findAll();

        return view('admin/order_list', $data);
    }

    // View order items
    public function view($id)
    {
        $orderModel = new OrderModel();
        $itemModel = new OrderItemModel();

        $data['order'] = $orderModel->find($id);

        $data['items'] = $itemModel
            ->where('order_id', $id)
            ->findAll();

        return view('admin/order_view', $data);
    }

    // Update status
    public function updateStatus($id)
    {
        $model = new OrderModel();

        $model->update($id, [
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->back()->with('success', 'Status updated');
    }
}
