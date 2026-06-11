<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImageModel extends \CodeIgniter\Model
{
    protected $table = 'product_images';
    protected $allowedFields = ['product_id', 'variant_id', 'image'];
}
