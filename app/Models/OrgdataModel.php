<?php

namespace App\Models;

use CodeIgniter\Model;

class OrgdataModel extends Model
{
    protected $table = 'tb_org_data';
    protected $allowedFields = ['org_name', 'about', 'web_url', 'email', 'alt_email', 'address', 'phone_number', 'org_logo', 'web_icon', 'about_img', 'facebook', 'instagram', 'whatsapp', 'maps'];
}
