<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PromoBannerModel;

class PromoBannerController extends BaseController
{
    public function index()
    {
        $model = new PromoBannerModel();

        $data['banners'] = $model
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return view('admin/promo_banner/index', $data);
    }

    public function create()
    {
        return view('admin/promo_banner/create');
    }

    public function store()
    {
        $model = new PromoBannerModel();

        $image = $this->request->getFile('image');

        $imageName = '';

        if ($image && $image->isValid()) {

            $imageName = $image->getRandomName();

            $image->move('uploads/promo', $imageName);
        }

        $model->save([
            'title' => $this->request->getPost('title'),
            'subtitle' => $this->request->getPost('subtitle'),
            'button_text' => $this->request->getPost('button_text'),
            'button_link' => $this->request->getPost('button_link'),
            'image' => $imageName,
            'status' => $this->request->getPost('status'),
            'sort_order' => $this->request->getPost('sort_order'),
        ]);

        return redirect()->to('/admin/promo-banner');
    }

    public function edit($id)
    {
        $model = new PromoBannerModel();

        $data['banner'] = $model->find($id);

        return view('admin/promo_banner/edit', $data);
    }

    public function update($id)
    {
        $model = new PromoBannerModel();

        $banner = $model->find($id);

        $imageName = $banner['image'];

        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {

            $imageName = $image->getRandomName();

            $image->move('uploads/promo', $imageName);
        }

        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'subtitle' => $this->request->getPost('subtitle'),
            'button_text' => $this->request->getPost('button_text'),
            'button_link' => $this->request->getPost('button_link'),
            'image' => $imageName,
            'status' => $this->request->getPost('status'),
            'sort_order' => $this->request->getPost('sort_order'),
        ]);

        return redirect()->to('/admin/promo-banner');
    }

    public function delete($id)
    {
        $model = new PromoBannerModel();

        $model->delete($id);

        return redirect()->to('/admin/promo-banner');
    }
}
