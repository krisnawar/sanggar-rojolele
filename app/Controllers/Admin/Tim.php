<?php

namespace App\Controllers\Admin;

use App\Models\TimModel;

class Tim extends AdminPage
{
    protected $timModel;

    public function __construct()
    {
        parent::__construct();

        $this->timModel = new TimModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Tim';
        $this->data['breadcrumbs'] = array('Admin', 'Tim');
        $this->data['teams'] = $this->timModel->findAll();

        return view('admin/page/tim', $this->data);
    }

    public function postSave()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'name' => 'required',
            'title' => 'required',
            'photo' => [
                'uploaded[photo]',
                'max_size[photo, 2048]',
                'is_image[photo]'
            ]
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/tim'));
        }

        $img = $this->request->getFile('photo');
        $filename = $img->getRandomName();
        $img->move('assets/img/team', $filename);

        $this->timModel->save([
            'name' => $this->request->getVar('name'),
            'title' => $this->request->getVar('title'),
            'path' => '/assets/img/team/' . $filename,
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Anggota baru berhasil ditambahkan.']);
        return redirect()->to(base_url('/admin/tim'));
    }

    public function postUpdate($idsha)
    {
        $previous = $this->timModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        helper(['form', 'url']);
        if (!$this->validate([
            'name' => 'required',
            'title' => 'required',
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/tim'));
        }

        if ($this->request->getFile('photo')->isValid()) {
            $img = $this->request->getFile('photo');
            $filename = $img->getRandomName();
            $img->move('assets/img/team', $filename);
            unlink(ltrim($previous['path'], $previous['path'][0]));
        } else {
            $filename = ltrim($previous['path'], '/assets/img/team/');
        }

        $this->timModel->update($previous['id'], [
            'name' => $this->request->getVar('name'),
            'title' => $this->request->getVar('title'),
            'path' => '/assets/img/team/' . $filename,
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Data anggota berhasil diedit.']);
        return redirect()->to(base_url('/admin/tim'));
    }

    public function postHapus()
    {
        $idsha = $this->request->getVar('idhapus');
        $previous = $this->timModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        $this->timModel->where('substring(sha1(id), 3, 13)', $idsha);

        if ($this->timModel->delete()) {
            unlink(ltrim($previous['path'], $previous['path'][0]));
            session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Bingo!</strong> Anggota tim berhasil dihapus.']);
            return redirect()->to(base_url('/admin/tim'));
        } else {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!!</strong> Gagal menghapus anggota tim']);
            return redirect()->to(base_url('/admin/tim'));
        }
    }
}
