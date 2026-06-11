<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;


class Product extends BaseController
{

    public function index()
    {
        $model = new \App\Models\ProductModel();

        $categoryId = $this->request->getGet('category');

        $query = $model
            ->select('products.*')
            ->join('categories', 'categories.id = products.category_id')
            ->where('categories.status', 1);

        // ✅ Apply filter if selected
        if ($categoryId) {
            $query->where('products.category_id', $categoryId);
        }

        $data['products'] = $query->findAll();

        // Load categories for filter dropdown
        $categoryModel = new \App\Models\CategoryModel();
        $data['categories'] = $categoryModel
            ->where('status', 1)
            ->findAll();

        return view('admin/product_list', $data);
    }

    public function create()
    {
        $catModel = new CategoryModel();


        $data['categories'] = $catModel->findAll();


        return view('admin/add_product', $data);
    }

    public function store()
    {
        $productModel = new ProductModel();
        $variantModel = new \App\Models\ProductVariantModel();
        $imageModel = new \App\Models\ProductImageModel();

        // MAIN IMAGE
        $file = $this->request->getFile('image');
        $imageName = null;

        if ($file && $file->isValid()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/products/', $imageName);
        }

        // SLUG
        $slug = $this->request->getPost('slug');
        if (!$slug) {
            $slug = url_title($this->request->getPost('name'), '-', true);
        }

        // SAVE PRODUCT
        $productId = $productModel->insert([
            'name' => $this->request->getPost('name'),
            'brand' => $this->request->getPost('brand'),
            'gender' => $this->request->getPost('gender'),
            'slug' => $slug,
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
            'tags' => $this->request->getPost('tags'),
            'status' => $this->request->getPost('status'),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'specifications' => $this->request->getPost('specifications'),
            'is_featured'  => $this->request->getPost('is_featured') ? 1 : 0,
            'is_sponsored' => $this->request->getPost('is_sponsored') ? 1 : 0,

            'allow_coupon' => $this->request->getPost('allow_coupon') ?? 1,
            'image' => $imageName
        ]);

        $colors = $this->request->getPost('color') ?? [];
        $stocks = $this->request->getPost('variant_stock') ?? [];
        $sizes  = $this->request->getPost('size') ?? [];
        $prices = $this->request->getPost('variant_price') ?? [];
        $discounts = $this->request->getPost('variant_discount') ?? [];


        $files = $this->request->getFiles();

        foreach ($colors as $i => $color) {

            if (!$color) continue;

            $variantId = $variantModel->insert([
                'product_id' => $productId,
                'color'      => $color,
                'size'       => $sizes[$i] ?? null,
                'price'      => $prices[$i] ?? 0,
                'discount'   => $discounts[$i] ?? 0,
                'stock'      => $stocks[$i] ?? 0
            ]);

            // 🔥 HANDLE IMAGES

            if (isset($files["variant_images_$i"])) {

                foreach ($files["variant_images_$i"] as $img) {

                    if ($img->isValid() && !$img->hasMoved()) {

                        $imgName = $img->getRandomName();
                        $img->move('uploads/products/', $imgName);

                        $imageModel->insert([
                            'product_id' => $productId,
                            'variant_id' => $variantId,
                            'image'      => $imgName
                        ]);
                    }
                }
            }
        }

        return redirect()->to('/admin/product/list')
            ->with('success', 'Product added with variants');
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $variantModel = new \App\Models\ProductVariantModel();
        $imageModel = new \App\Models\ProductImageModel();
        $catModel = new CategoryModel();

        $product = $productModel->find($id);

        $variants = $variantModel
            ->where('product_id', $id)
            ->findAll();

        // 🔥 Attach images to each variant
        foreach ($variants as &$v) {
            $v['images'] = $imageModel
                ->where('variant_id', $v['id'])
                ->findAll();
        }

        $data['product'] = $product;
        $data['variants'] = $variants;
        $data['categories'] = $catModel->findAll();

        return view('admin/edit_product', $data);
    }
    public function update($id)
    {
        $productModel = new ProductModel();
        $variantModel = new \App\Models\ProductVariantModel();

        $file = $this->request->getFile('image');
        $imageName = $this->request->getPost('old_image');

        if ($file && $file->isValid()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/products/', $imageName);
        }

        // ✅ UPDATE PRODUCT
        $productModel->update($id, [
            'name' => $this->request->getPost('name'),
            'brand' => $this->request->getPost('brand'),
            'gender' => $this->request->getPost('gender'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'discount' => $this->request->getPost('discount'),
            'category_id' => $this->request->getPost('category_id'),
            'image' => $imageName,
            'specifications' => $this->request->getPost('specifications'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
            'is_sponsored' => $this->request->getPost('is_sponsored') ? 1 : 0,
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'tags' => $this->request->getPost('tags'),
            'status' => $this->request->getPost('status'),
            'slug' => $this->request->getPost('slug'),
        ]);

        // ✅ UPDATE VARIANTS
        $variantIds = $this->request->getPost('variant_id');
        $colors = $this->request->getPost('color');
        $sizes = $this->request->getPost('size');
        $prices = $this->request->getPost('variant_price');
        $stocks = $this->request->getPost('variant_stock');
        $discounts = $this->request->getPost('variant_discount');
        $statuses = $this->request->getPost('variant_status');

        $imageModel = new \App\Models\ProductImageModel();

        foreach ($variantIds as $i => $vid) {

            // ✅ NEW VARIANT
            if ($vid == 'new') {

                $newId = $variantModel->insert([
                    'product_id' => $id,
                    'color' => $colors[$i],
                    'size' => $sizes[$i],
                    'price' => $prices[$i],
                    'discount' => $discounts[$i],
                    'stock' => $stocks[$i],
                    'status' => $statuses[$i],
                ]);

                // upload images
                $files = $this->request->getFiles();
                if (isset($files["variant_images_new_$i"])) {
                    foreach ($files["variant_images_new_$i"] as $img) {
                        if ($img->isValid()) {
                            $name = $img->getRandomName();
                            $img->move('uploads/products/', $name);

                            $imageModel->insert([
                                'product_id' => $id,
                                'variant_id' => $newId,
                                'image' => $name
                            ]);
                        }
                    }
                }
            } else {
                // ✅ UPDATE EXISTING
                $variantModel->update($vid, [
                    'color' => $colors[$i],
                    'size' => $sizes[$i],
                    'price' => $prices[$i],
                    'discount' => $discounts[$i],
                    'stock' => $stocks[$i],
                    'status' => $statuses[$i],
                ]);

                // upload extra images
                $files = $this->request->getFiles();
                if (isset($files["variant_images_$i"])) {
                    foreach ($files["variant_images_$i"] as $img) {
                        if ($img->isValid()) {
                            $name = $img->getRandomName();
                            $img->move('uploads/products/', $name);

                            $imageModel->insert([
                                'product_id' => $id,
                                'variant_id' => $vid,
                                'image' => $name
                            ]);
                        }
                    }
                }
            }
        }

        return redirect()->to('/admin/product/list')
            ->with('success', 'Product + Variants updated');
    }


    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);

        return redirect()->to('/admin/product/list')
            ->with('success', 'Product deleted successfully');
    }

    public function deleteVariant($id)
    {
        $variantModel = new \App\Models\ProductVariantModel();
        $variantModel->delete($id);

        return redirect()->back()->with('success', 'Variant deleted');
    }

    public function deleteImage($id)
    {
        $model = new \App\Models\ProductImageModel();
        $model->delete($id);

        return redirect()->back()->with('success', 'Image deleted');
    }

    public function toggle($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $newStatus = ($product['status'] == 1) ? 0 : 1;

        $model->update($id, ['status' => $newStatus]);

        return redirect()->to('/admin/product/list')
            ->with('success', 'Product status updated');
    }
}
