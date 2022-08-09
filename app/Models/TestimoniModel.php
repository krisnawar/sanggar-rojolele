<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimoniModel extends Model
{
    protected $table = 'tb_testimoni';
    protected $allowedFields = ['name', 'title', 'testimonial', 'photo', 'timestamp'];
}
