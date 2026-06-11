<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HomeBanner extends BaseController
{
    public function index()
    {
        $model = new \App\Models\HomeBannerModel();

        $data['banners'] = $model->orderBy('sort_order', 'ASC')->findAll();

        return view('admin/banners/index', $data);
    }

    public function create()
    {
        return view('admin/banners/create');
    }

    public function store()
    {
        $model = new \App\Models\HomeBannerModel();

        // Upload Desktop Image
        $desktop = $this->request->getFile('desktop_image');
        $desktopName = $desktop->getRandomName();
        $desktop->move('uploads/banners/', $desktopName);

        // Upload Mobile Image
        $mobile = $this->request->getFile('mobile_image');
        $mobileName = $mobile->getRandomName();
        $mobile->move('uploads/banners/', $mobileName);

        $model->save([
            'title' => $this->request->getPost('title'),
            'subtitle' => $this->request->getPost('subtitle'),
            'button_text' => $this->request->getPost('button_text'),
            'button_link' => $this->request->getPost('button_link'),
            'desktop_image' => $desktopName,
            'mobile_image' => $mobileName,
            'sort_order' => $this->request->getPost('sort_order'),
            'status' => $this->request->getPost('status'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
        ]);

        return redirect()->to('/admin/banner')->with('success', 'Banner Added');
    }

    public function delete($id)
    {
        $model = new \App\Models\HomeBannerModel();
        $model->delete($id);

        return redirect()->back()->with('success', 'Deleted');
    }

    public function edit($id)
    {
        $model = new \App\Models\HomeBannerModel();

        $data['banner'] = $model->find($id);

        return view('admin/banners/edit', $data);
    }

    public function update($id)
    {
        $model = new \App\Models\HomeBannerModel();

        $banner = $model->find($id);

        $data = [
            'title' => $this->request->getPost('title'),
            'subtitle' => $this->request->getPost('subtitle'),
            'button_text' => $this->request->getPost('button_text'),
            'button_link' => $this->request->getPost('button_link'),
            'sort_order' => $this->request->getPost('sort_order'),
            'status' => $this->request->getPost('status'),
        ];

        // Desktop image
        $desktop = $this->request->getFile('desktop_image');
        if ($desktop && $desktop->isValid()) {
            $name = $desktop->getRandomName();
            $desktop->move('uploads/banners/', $name);
            $data['desktop_image'] = $name;
        }

        // Mobile image
        $mobile = $this->request->getFile('mobile_image');
        if ($mobile && $mobile->isValid()) {
            $name = $mobile->getRandomName();
            $mobile->move('uploads/banners/', $name);
            $data['mobile_image'] = $name;
        }

        $model->update($id, $data);

        return redirect()->to('/admin/banner')->with('success', 'Updated');
    }

    public function sort()
    {
        $model = new \App\Models\HomeBannerModel();

        $order = $this->request->getPost('order');

        foreach ($order as $index => $id) {
            $model->update($id, ['sort_order' => $index]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }
}
