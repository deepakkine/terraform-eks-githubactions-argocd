<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeBannerModel extends Model
{
    protected $table = 'home_banners';
    protected $allowedFields = [
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'desktop_image',
        'mobile_image',
        'sort_order',
        'status',
        'start_date',
        'end_date'
    ];
}
