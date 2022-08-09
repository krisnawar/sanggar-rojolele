<?php

namespace App\Controllers;

class Home extends FrontPage
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //return view('welcome_message');
        return view('front/beranda', $this->data);
    }
}
