<?php

namespace App\Controllers;

use App\Models\OrgdataModel;
use App\Models\CategoriesModel;

class FrontPage extends BaseController
{
    public $data;
    protected $orgdataModel;
    protected $categoriesModel;
    public function __construct()
    {
        $this->orgdataModel = new OrgdataModel();
        $this->categoriesModel = new CategoriesModel();

        $this->data = array(
            'title' => 'Sanggar Rojolele',
            'uriinfo' => \Config\Services::request()->uri->getSegments(),
            'orgdata' => $this->orgdataModel->find(1),
            'categories'   => $this->categoriesModel->findAll(),
        );
    }
}
