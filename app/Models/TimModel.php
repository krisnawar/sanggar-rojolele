<?php

namespace App\Models;

use CodeIgniter\Model;

class TimModel extends Model
{
    protected $table = 'tb_tim';
    protected $allowedFields = ['name', 'title', 'path'];
}
