<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{


    public function index()
    {
        $productModel = new \App\Models\ProductModel();
        $categoryModel = new \App\Models\CategoryModel();
        $variantModel = new \App\Models\ProductVariantModel();
        $imageModel   = new \App\Models\ProductImageModel();
        $bannerModel = new \App\Models\HomeBannerModel();
        $promoModel = new \App\Models\PromoBannerModel;

        // home page banners images getting 
        $banners = $bannerModel
            ->where('status', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();


        // ✅ START BUILDER (ONLY ONCE)
        $builder = $productModel
            ->select('products.*')
            ->join('categories', 'categories.id = products.category_id')
            ->where('products.status', 1)
            ->where('categories.status', 1);

        // ✅ SEARCH FILTER
        $search = $this->request->getGet('search');
        if ($search) {
            $builder->groupStart()
                ->like('name', $search)
                ->orLike('tags', $search)
                ->groupEnd();
        }

        // ✅ CATEGORY FILTER
        $category = $this->request->getGet('category');
        if ($category) {
            $builder->where('category_id', $category);
        }

        // ✅ GET PRODUCTS
        $products = $builder->findAll();

        foreach ($products as &$p) {

            // 🔥 GET LOWEST PRICE VARIANT (BEST UX)
            $variant = $variantModel
                ->where('product_id', $p['id'])
                ->orderBy('price', 'ASC')
                ->first();

            if ($variant) {

                $price = $variant['price'];
                $discount = $variant['discount'];

                // ✅ FINAL PRICE CALCULATION
                $final = $discount > 0
                    ? $price - ($price * $discount / 100)
                    : $price;

                $p['final_price'] = $final;
                $p['mrp'] = $price;
                $p['discount'] = $discount;

                // 🔥 GET IMAGE FROM VARIANT
                $img = $imageModel
                    ->where('variant_id', $variant['id'])
                    ->first();

                $p['variant_image'] = $img['image'] ?? $p['image'];
            } else {
                // ✅ FALLBACK (NO VARIANT)
                $p['final_price'] = $p['price'];
                $p['mrp'] = $p['price'];
                $p['discount'] = 0;
                $p['variant_image'] = $p['image'];
            }
        }

        //get promo banners
        $promoBanners = $promoModel
            ->where('status', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();


        // ==========================================
        // FEATURED PRODUCTS
        // ==========================================

        $featuredProducts = $productModel
            ->select('products.*')
            ->join('categories', 'categories.id = products.category_id')
            ->where('products.is_featured', 1)
            ->where('products.status', 1)
            ->where('categories.status', 1)
            ->orderBy('products.id', 'DESC')
            ->findAll(12);

        foreach ($featuredProducts as &$p) {

            $variant = $variantModel
                ->where('product_id', $p['id'])
                ->orderBy('price', 'ASC')
                ->first();

            if ($variant) {

                $price = $variant['price'];
                $discount = $variant['discount'];

                $final = $discount > 0
                    ? $price - ($price * $discount / 100)
                    : $price;

                $p['final_price'] = $final;
                $p['mrp'] = $price;
                $p['discount'] = $discount;

                $img = $imageModel
                    ->where('variant_id', $variant['id'])
                    ->first();

                $p['variant_image'] = $img['image'] ?? $p['image'];
            } else {

                $p['final_price'] = $p['price'];
                $p['mrp'] = $p['price'];
                $p['discount'] = 0;
                $p['variant_image'] = $p['image'];
            }
        }


        // ==========================================
        // SPONSORED PRODUCTS
        // ==========================================

        $sponsoredProducts = $productModel
            ->select('products.*')
            ->join('categories', 'categories.id = products.category_id')
            ->where('products.is_sponsored', 1)
            ->where('products.status', 1)
            ->where('categories.status', 1)
            ->orderBy('products.id', 'DESC')
            ->findAll(12);

        foreach ($sponsoredProducts as &$p) {

            $variant = $variantModel
                ->where('product_id', $p['id'])
                ->orderBy('price', 'ASC')
                ->first();

            if ($variant) {

                $price = $variant['price'];
                $discount = $variant['discount'];

                $final = $discount > 0
                    ? $price - ($price * $discount / 100)
                    : $price;

                $p['final_price'] = $final;
                $p['mrp'] = $price;
                $p['discount'] = $discount;

                $img = $imageModel
                    ->where('variant_id', $variant['id'])
                    ->first();

                $p['variant_image'] = $img['image'] ?? $p['image'];
            } else {

                $p['final_price'] = $p['price'];
                $p['mrp'] = $p['price'];
                $p['discount'] = 0;
                $p['variant_image'] = $p['image'];
            }
        }


        return view('frontend/home', [
            'products' => $products,
            'categories' => $categoryModel
                ->where('status', 1)
                ->findAll(),
            'banners' => $banners,
            'promoBanners' => $promoBanners,
            'featuredProducts' => $featuredProducts,
            'sponsoredProducts' => $sponsoredProducts
        ]);
    }

    public function view($slug)
    {
        $productModel = new ProductModel();
        $variantModel = new \App\Models\ProductVariantModel();
        $imageModel = new \App\Models\ProductImageModel();

        $product = $productModel
            ->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->where('products.slug', $slug)
            ->first();

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // variants
        $variants = $variantModel
            ->where('product_id', $product['id'])
            ->orderBy('color', 'ASC')
            ->findAll();

        // images
        $images = $imageModel
            ->where('product_id', $product['id'])
            ->findAll();

        $variantImages = [];

        foreach ($images as $img) {
            $variantImages[$img['variant_id']][] = $img['image'];
        }

        // related
        $related = $productModel
            ->where('category_id', $product['category_id'])
            ->where('id !=', $product['id'])
            ->findAll(4);

        return view('frontend/product_detail', [
            'product' => $product,
            'variants' => $variants,
            'variantImages' => $variantImages,
            'related' => $related,

            'meta_title' => $product['meta_title'] ?? $product['name'],
            'meta_description' => $product['meta_description'] ?? '',
        ]);
    }

    public function category($slug)
    {
        $categoryModel = new \App\Models\CategoryModel();
        $productModel  = new \App\Models\ProductModel();
        $variantModel  = new \App\Models\ProductVariantModel();
        $imageModel    = new \App\Models\ProductImageModel();

        // 🔥 GET CATEGORY
        $category = $categoryModel->where('slug', $slug)->first();

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // 🔥 GET SUBCATEGORIES
        $subCategories = $categoryModel
            ->where('parent_id', $category['id'])
            ->findAll();

        // 🔥 COLLECT CATEGORY IDS (MAIN + SUB)
        $catIds = [$category['id']];
        foreach ($subCategories as $sub) {
            $catIds[] = $sub['id'];
        }

        // 🔥 FILTER INPUTS (FROM URL)
        $selectedColors = $this->request->getGet('color') ?? [];
        $selectedSizes  = $this->request->getGet('size') ?? [];
        $minPrice = $this->request->getGet('min_price');
        $maxPrice = $this->request->getGet('max_price');
        $sort = $this->request->getGet('sort');

        // 🔥 GET PRODUCTS
        $products = $productModel
            ->whereIn('category_id', $catIds)
            ->where('status', 1)
            ->findAll();

        foreach ($products as &$p) {

            // 🔥 APPLY VARIANT FILTER (COLOR/SIZE)
            $variantQuery = $variantModel
                ->where('product_id', $p['id']);

            // 🔥 SORTING
            if ($sort == 'price_low') {
                $variantQuery->orderBy('price', 'ASC');
            } elseif ($sort == 'price_high') {
                $variantQuery->orderBy('price', 'DESC');
            } else {
                $variantQuery->orderBy('price', 'ASC');
            }

            // ✅ COLOR FILTER
            if (!empty($selectedColors)) {
                $variantQuery->whereIn('color', $selectedColors);
            }

            // ✅ SIZE FILTER
            if (!empty($selectedSizes)) {
                $variantQuery->whereIn('size', $selectedSizes);
            }

            // ✅ PRICE FILTER
            if ($minPrice) {
                $variantQuery->where('price >=', $minPrice);
            }

            if ($maxPrice) {
                $variantQuery->where('price <=', $maxPrice);
            }

            // 🔥 GET BEST VARIANT

            $variant = $variantQuery->first();
            if (!$variant) {
                $p['skip'] = true;
                continue;
            }

            $price = $variant['price'];
            $discount = $variant['discount'];

            $final = $discount > 0
                ? $price - ($price * $discount / 100)
                : $price;

            $p['final_price'] = $final;
            $p['mrp'] = $price;
            $p['discount'] = $discount;

            // 🔥 IMAGE
            $img = $imageModel
                ->where('variant_id', $variant['id'])
                ->first();

            $p['image'] = $img['image'] ?? $p['image'];
        }


        // 🔥 REMOVE FILTERED PRODUCTS
        $products = array_filter($products, function ($p) {
            return empty($p['skip']);
        });

        // 🔥 GET AVAILABLE FILTERS (ONLY FROM CURRENT CATEGORY PRODUCTS)
        $productIds = array_column($products, 'id');

        $colors = [];
        $sizes  = [];

        if (!empty($productIds)) {

            $colors = $variantModel
                ->select('color')
                ->whereIn('product_id', $productIds)
                ->groupBy('color')
                ->findAll();

            $sizes = $variantModel
                ->select('size')
                ->whereIn('product_id', $productIds)
                ->groupBy('size')
                ->findAll();
        }

        // 🔥 AJAX RESPONSE ONLY PRODUCTS
        if ($this->request->isAJAX()) {
            return view('frontend/partials/product_list', ['products' => $products]);
        }

        return view('frontend/category_page', [
            'category' => $category,
            'products' => $products,
            'subCategories' => $subCategories,
            'colors' => $colors,
            'sizes' => $sizes,
            'selectedColors' => $selectedColors,
            'selectedSizes' => $selectedSizes,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'sort' => $sort
        ]);
    }

    public function ajaxCategory($slug)
    {
        // reuse same logic
        return $this->category($slug);
    }
}
