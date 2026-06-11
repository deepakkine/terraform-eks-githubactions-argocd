<?php

namespace App\Models;

use CodeIgniter\Model;

class CouponModel extends Model
{
    protected $table = 'coupons';
    protected $allowedFields = ['code', 'type', 'value', 'min_amount', 'max_discount', 'usage_limit', 'used_count', 'status', 'expires_at'];
}
