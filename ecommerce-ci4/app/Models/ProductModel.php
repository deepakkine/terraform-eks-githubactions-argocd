<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    protected $allowedFields = [

        'category_id',
        'name',
        'slug',
        'description',
        'specifications',
        'price',
        'discount',
        'stock',
        'image',
        'brand',
        'gender',
        'tags',
        'status',

        // SEO
        'meta_title',
        'meta_description',

        // PROMOTION
        'is_featured',
        'is_sponsored',

        // COUPON
        'allow_coupon'
    ];
}
