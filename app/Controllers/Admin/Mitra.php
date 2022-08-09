<?php

namespace App\Controllers\Admin;

use App\Models\MitraModel;

class Mitra extends AdminPage
{
    protected $mitraModel;

    public function __construct()
    {
        parent::__construct();

        $this->mitraModel = new MitraModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Mitra';
        $this->data['breadcrumbs'] = array('Admin', 'Mitra');
        $this->data['mitras'] = $this->mitraModel->findAll();

        return view('admin/page/mitra', $this->data);
    }

    public function getAdd()
    {
        $this->data['subtitle']    = 'Tambah Mitra';
        $this->data['breadcrumbs'] = array('Admin', 'Mitra', 'Tambah Mitra');

        return view('admin/page/tambahmitra', $this->data);
    }

    public function getEdit($idsha)
    {
        $this->data['subtitle']    = 'Edit Mitra';
        $this->data['breadcrumbs'] = array('Admin', 'Mitra', 'Edit Mitra');
        $this->data['mitra'] = $this->mitraModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];

        return view('admin/page/editmitra', $this->data);
    }

    public function postSave()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'namamitra' => 'required',
            'logomitra' => [
                'uploaded[logomitra]',
                'max_size[logomitra, 2048]',
                'is_image[logomitra]'
            ]
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/mitra/add'));
        }

        $img = $this->request->getFile('logomitra');
        $filename = $img->getRandomName();
        $img->move('assets/img/mitra', $filename);

        $this->mitraModel->save([
            'name' => $this->request->getVar('namamitra'),
            'mitra_logo' => '/assets/img/mitra/' . $filename
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Mitra baru berhasil ditambahkan.']);
        return redirect()->to(base_url('/admin/mitra'));
    }

    public function postUpdate($idsha)
    {
        $previous = $this->mitraModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        helper(['form', 'url']);
        if (!$this->validate([
            'namamitra' => 'required'
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/mitra/edit/' . $idsha));
        }

        if ($this->request->getFile('logomitra')->isValid()) {
            $img = $this->request->getFile('logomitra');
            $filename = $img->getRandomName();
            $img->move('assets/img/mitra', $filename);
            unlink(ltrim($previous['mitra_logo'], $previous['mitra_logo'][0]));
        } else {
            $filename = ltrim($previous['mitra_logo'], '/assets/img/mitra/');
        }

        $this->mitraModel->update($previous['id'], [
            'name' => $this->request->getVar('namamitra'),
            'mitra_logo' => '/assets/img/mitra/' . $filename
        ]);

        // dd($this->articleModel->getLastQuery());

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Informasi mitra berhasil diperbarui.']);
        return redirect()->to(base_url('/admin/mitra'));
    }

    public function postHapus()
    {
        $idsha = $this->request->getVar('idhapus');
        $previous = $this->mitraModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        $this->mitraModel->where('substring(sha1(id), 3, 13)', $idsha);

        if ($this->mitraModel->delete()) {
            unlink(ltrim($previous['mitra_logo'], $previous['mitra_logo'][0]));
            session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Bingo!</strong> Kemitraan berhasil dihapus.']);
            return redirect()->to(base_url('/admin/mitra'));
        } else {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!!</strong> Gagal menghapus mitra']);
            return redirect()->to(base_url('/admin/mitra'));
        }
    }
}
