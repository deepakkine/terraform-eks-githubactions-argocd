<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function index()
    {
        $model = new \App\Models\CategoryModel();

        $data['categories'] = $model->findAll();

        return view('admin/category/index', $data);
    }

    public function create()
    {
        $model = new \App\Models\CategoryModel();

        $data['parents'] = $model
            ->where('status', 1)
            ->findAll(); // 🔥 IMPORTANT: remove parent_id filter

        return view('admin/category/create', $data);
    }

    public function store()
    {
        $model = new \App\Models\CategoryModel();

        // IMAGE
        $file = $this->request->getFile('image');
        $imageName = null;

        if ($file && $file->isValid()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/categories/', $imageName);
        }

        // SLUG AUTO
        $slug = $this->request->getPost('slug');
        if (!$slug) {
            $slug = url_title($this->request->getPost('name'), '-', true);
        }

        $model->save([
            'name' => $this->request->getPost('name'),
            'parent_id' => $this->request->getPost('parent_id') ?: null,
            'slug' => $slug,
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'meta_keywords' => $this->request->getPost('meta_keywords'),
            'image' => $imageName,
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/admin/category/list')->with('success', 'Category added');
    }


    public function edit($id)
    {
        $model = new \App\Models\CategoryModel();

        $data['category'] = $model->find($id);

        $data['parents'] = $model
            ->where('status', 1)
            ->where('id !=', $id)
            ->findAll();

        return view('admin/category/edit', $data);
    }

    public function update($id)
    {
        $model = new \App\Models\CategoryModel();

        $category = $model->find($id);

        // IMAGE
        $file = $this->request->getFile('image');

        $imageName = $category['image'];

        if ($file && $file->isValid()) {

            $imageName = $file->getRandomName();

            $file->move('uploads/categories/', $imageName);
        }

        // SLUG
        $slug = $this->request->getPost('slug');

        if (!$slug) {
            $slug = url_title($this->request->getPost('name'), '-', true);
        }

        $model->update($id, [

            'name' => $this->request->getPost('name'),

            'parent_id' => $this->request->getPost('parent_id') ?: null,

            'slug' => $slug,

            'meta_title' => $this->request->getPost('meta_title'),

            'meta_description' => $this->request->getPost('meta_description'),

            'meta_keywords' => $this->request->getPost('meta_keywords'),

            'image' => $imageName,

            'status' => $this->request->getPost('status')

        ]);

        // =====================================
        // AUTO DISABLE CHILD CATEGORIES
        // =====================================

        $status = $this->request->getPost('status');

        if ($status == 0) {

            $model->where('parent_id', $id)
                ->set(['status' => 0])
                ->update();
        }

        return redirect()->to('/admin/category/list')
            ->with('success', 'Category updated successfully');
    }

    public function delete($id)
    {
        $model = new \App\Models\CategoryModel();

        $category = $model->find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $model->delete($id);

        return redirect()->to('/admin/category/list')
            ->with('success', 'Category deleted successfully');
    }
}
