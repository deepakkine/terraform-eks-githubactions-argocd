<?php

namespace App\Models;

use CodeIgniter\Model;

class WishlistModel extends Model
{
    protected $table = 'wishlists';

    protected $allowedFields = [
        'user_id',
        'product_id'
    ];
}
