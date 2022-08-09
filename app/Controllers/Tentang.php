<?php

namespace App\Controllers;

use App\Models\MitraModel;
use App\Models\TimModel;

class Tentang extends FrontPage
{
    protected $mitraModel;
    protected $timModel;
    public function __construct()
    {
        parent::__construct();

        $this->mitraModel = new MitraModel();
        $this->timModel = new TimModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Tentang Kami';
        $this->data['breadcrumbs'] = array('Beranda', 'Tentang Kami');
        $this->data['mitras']       = $this->mitraModel->findAll();
        $this->data['teams']       = $this->timModel->findAll();

        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']     = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/tentang', $this->data);
    }
}
