<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';

    protected $allowedFields = [
        'order_id',
        'product_id',
        'variant_id',
        'qty',
        'price',

        // 🔥 IMPORTANT (ADD THESE)
        'product_name',
        'product_image',
        'variant_color',
        'variant_size'
    ];
}
