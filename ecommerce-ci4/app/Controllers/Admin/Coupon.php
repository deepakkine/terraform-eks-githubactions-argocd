<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CouponModel;

class Coupon extends BaseController
{
    public function index()
    {
        $model = new CouponModel();

        return view('admin/coupons/index', [
            'coupons' => $model->orderBy('id', 'DESC')->findAll()
        ]);
    }

    public function create()
    {
        return view('admin/coupons/create');
    }

    public function store()
    {
        $model = new CouponModel();

        $model->save([
            'code' => strtoupper($this->request->getPost('code')),
            'type' => $this->request->getPost('type'),
            'value' => $this->request->getPost('value'),
            'min_amount' => $this->request->getPost('min_amount'),
            'max_discount' => $this->request->getPost('max_discount'),
            'usage_limit' => $this->request->getPost('usage_limit'),
            'status' => $this->request->getPost('status'),
            'expires_at' => $this->request->getPost('expires_at')
        ]);

        return redirect()->to('/admin/coupons')->with('success', 'Coupon Created');
    }

    public function edit($id)
    {
        $model = new CouponModel();

        return view('admin/coupons/edit', [
            'coupon' => $model->find($id)
        ]);
    }

    public function update($id)
    {
        $model = new CouponModel();

        $model->update($id, [
            'code' => strtoupper($this->request->getPost('code')),
            'type' => $this->request->getPost('type'),
            'value' => $this->request->getPost('value'),
            'min_amount' => $this->request->getPost('min_amount'),
            'max_discount' => $this->request->getPost('max_discount'),
            'usage_limit' => $this->request->getPost('usage_limit'),
            'status' => $this->request->getPost('status'),
            'expires_at' => $this->request->getPost('expires_at')
        ]);

        return redirect()->to('/admin/coupons')->with('success', 'Coupon Updated');
    }

    public function delete($id)
    {
        $model = new CouponModel();
        $model->delete($id);

        return redirect()->to('/admin/coupons')->with('success', 'Coupon Deleted');
    }
}
