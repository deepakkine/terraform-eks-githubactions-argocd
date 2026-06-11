<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['user_id', 'total', 'status', 'name', 'phone', 'address', 'city', 'state', 'pincode'];
}
