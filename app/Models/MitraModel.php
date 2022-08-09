<?php

namespace App\Models;

use CodeIgniter\Model;

class MitraModel extends Model
{
    protected $table = 'tb_mitra';
    protected $allowedFields = ['name', 'mitra_logo'];
}
