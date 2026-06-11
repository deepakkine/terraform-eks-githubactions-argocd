<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';

    protected $allowedFields = [
        'name',
        'parent_id',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'image',
        'status'
    ];
}
