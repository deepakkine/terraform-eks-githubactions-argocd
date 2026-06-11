<?php

namespace App\Models;

use CodeIgniter\Model;

class PromoBannerModel extends Model
{
    protected $table = 'promo_banners';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'image',
        'status',
        'sort_order'
    ];
}
