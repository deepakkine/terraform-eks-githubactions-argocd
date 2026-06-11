<?php

namespace App\Models;

use CodeIgniter\Model;

class CouponUsageModel extends Model
{
    protected $table = 'coupon_usage';
    protected $allowedFields = ['user_id', 'coupon_id'];
}
