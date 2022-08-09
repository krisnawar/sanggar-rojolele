<?php

namespace App\Controllers\Admin;

class Register extends AdminPage
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Tambah Admin';
        $this->data['breadcrumbs'] = array('Admin', 'Tambah Admin');

        return view('admin/page/addadmin', $this->data);
    }
}
