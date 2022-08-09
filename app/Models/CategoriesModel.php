<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'tb_categories';
    protected $allowedFields = ['category', 'slug'];
}
