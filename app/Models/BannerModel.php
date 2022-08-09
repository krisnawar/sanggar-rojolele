<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'tb_banner';
    protected $allowedFields = ['title', 'description', 'path'];
}
