<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrgdataModel;

class AdminPage extends BaseController
{
    public $data;
    protected $orgdataModel;
    public function __construct()
    {
        $this->orgdataModel = new OrgdataModel();
        $this->data = array(
            'title' => 'Sanggar Rojolele',
            'uriinfo' => \Config\Services::request()->uri->getSegments(),
            'orgdata' => $this->orgdataModel->findAll()[0],
        );
        helper('auth');
    }
}
