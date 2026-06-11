<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table = 'addresses';
    protected $allowedFields = [
        'user_id',
        'name',
        'phone',
        'address',
        'city',
        'state',
        'pincode'
    ];
}
