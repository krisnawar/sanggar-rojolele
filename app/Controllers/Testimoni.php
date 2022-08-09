<?php

namespace App\Controllers;

use App\Models\TestimoniModel;

class Testimoni extends FrontPage
{
    protected $testimoniModel;
    public function __construct()
    {
        parent::__construct();

        $this->testimoniModel = new TestimoniModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']     = 'Testimoni';
        $this->data['breadcrumbs']  = array('Beranda', 'Testimoni');
        $this->data['testimonis']   = $this->testimoniModel->findAll();

        return view('front/testimoni', $this->data);

        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']     = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';
    }
}
