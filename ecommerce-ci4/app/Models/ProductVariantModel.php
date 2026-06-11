<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductVariantModel extends \CodeIgniter\Model
{
    protected $table = 'product_variants';
    protected $allowedFields = ['product_id', 'color', 'size', 'price', 'discount', 'stock'];
}
