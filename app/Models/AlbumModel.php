<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table = 'tb_album';
    protected $allowedFields = ['title', 'title_slug', 'description'];
}
