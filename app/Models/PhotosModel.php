<?php

namespace App\Models;

use CodeIgniter\Model;

class PhotosModel extends Model
{
    protected $table = 'tb_photos';
    protected $allowedFields = ['alt', 'path', 'id_album'];
}
