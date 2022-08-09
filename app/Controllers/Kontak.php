<?php

namespace App\Controllers;


class Kontak extends FrontPage
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $this->data['subtitle']    = 'Kontak';
        $this->data['breadcrumbs'] = array('Beranda', 'Kontak');

        return view('front/kontak', $this->data);
    }
}
