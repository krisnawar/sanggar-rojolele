<?php

namespace App\Controllers\Admin;

use App\Models\ArticleModel;
use App\Models\PhotosModel;
use App\Models\MitraModel;
use App\Models\TestimoniModel;

class Dashboard extends AdminPage
{
    protected $articleModel;
    protected $photosModel;
    protected $mitraModel;
    protected $testimoniModel;

    public function __construct()
    {
        parent::__construct();

        $this->articleModel = new ArticleModel();
        $this->photosModel = new PhotosModel();
        $this->mitraModel = new MitraModel();
        $this->testimoniModel = new TestimoniModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Dashboard';
        $this->data['breadcrumbs'] = array('Admin', 'Dashboard');

        $this->articleModel->selectCount('id');
        $this->data['article_count'] = $this->articleModel->get()->getResultArray()[0]['id'];

        $this->photosModel->selectCount('id');
        $this->data['photo_count'] = $this->photosModel->get()->getResultArray()[0]['id'];

        $this->mitraModel->selectCount('id');
        $this->data['mitra_count'] = $this->mitraModel->get()->getResultArray()[0]['id'];

        $this->testimoniModel->selectCount('id');
        $this->data['testimoni_count'] = $this->testimoniModel->get()->getResultArray()[0]['id'];

        return view('admin/page/dashboard', $this->data);
    }
}
