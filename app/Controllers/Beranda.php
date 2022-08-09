<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\OrgdataModel;
use App\Models\CategoriesModel;
use App\Models\MitraModel;
use App\Models\ArticleModel;
use App\Models\TimModel;

class Beranda extends FrontPage
{
    protected $bannerModel;
    protected $orgdataModel;
    protected $categoriesModel;
    protected $mitraModel;
    protected $articleModel;
    protected $timModel;

    public function __construct()
    {
        parent::__construct();

        $this->bannerModel = new BannerModel();
        $this->orgdataModel = new OrgdataModel();
        $this->categoriesModel = new CategoriesModel();
        $this->mitraModel = new MitraModel();
        $this->articleModel = new ArticleModel();
        $this->timModel = new TimModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']     = 'Beranda';
        $this->data['banners']      = $this->bannerModel->findAll();
        $this->data['mitras']       = $this->mitraModel->findAll();
        $this->data['articles']     = $this->articleModel->getCategoryJoinMostRead();
        $this->data['teams']        = $this->timModel->findAll();
        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']     = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/beranda', $this->data);
    }
}
