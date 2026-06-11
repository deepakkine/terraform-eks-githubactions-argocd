<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $orderModel = new OrderModel();
        $productModel = new ProductModel();
        $userModel = new UserModel();

        $filter = $this->request->getGet('filter');
        $date   = $this->request->getGet('date');
        $month  = $this->request->getGet('month');

        if ($filter == 'today') {
            $start = $end = date('Y-m-d');
        } elseif ($filter == 'month') {
            $start = date('Y-m-01');
            $end   = date('Y-m-t');
        } elseif ($filter == 'year') {
            $start = date('Y-01-01');
            $end   = date('Y-12-31');
        } elseif ($date) {
            $start = $end = $date;
        } elseif ($month) {
            $start = date('Y-m-01', strtotime($month));
            $end   = date('Y-m-t', strtotime($month));
        } else {
            $start = $end = date('Y-m-d');
        }

        // 📊 TOTAL ORDERS
        $totalOrders = $orderModel
            ->where("DATE(created_at) >=", $start)
            ->where("DATE(created_at) <=", $end)
            ->countAllResults();

        // 💰 TOTAL REVENUE
        $totalRevenue = $orderModel
            ->selectSum('total')
            ->where("DATE(created_at) >=", $start)
            ->where("DATE(created_at) <=", $end)
            ->first()['total'] ?? 0;

        // 📦 PRODUCTS
        $totalProducts = $productModel->countAll();

        // 👥 CUSTOMERS
        $totalUsers = $userModel->where('role', 'customer')->countAllResults();

        // 📈 CHART DATA (last 7 days)
        $chartData = $orderModel
            ->select("DATE(created_at) as date, COUNT(*) as orders, SUM(total) as revenue")
            ->groupBy("DATE(created_at)")
            ->orderBy("date", "ASC")
            ->findAll();

        return view('admin/dashboard', [
            'orders' => $totalOrders,
            'revenue' => $totalRevenue,
            'products' => $totalProducts,
            'users' => $totalUsers,
            'chartData' => $chartData,
            'start' => $start,
            'end' => $end
        ]);
    }
}
