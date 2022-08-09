<?php

namespace App\Controllers\Admin;

use App\Models\TestimoniModel;

class Testimoni extends AdminPage
{
    protected $testimoniModel;

    public function __construct()
    {
        parent::__construct();

        $this->testimoniModel = new TestimoniModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Testimoni';
        $this->data['breadcrumbs'] = array('Admin', 'Testimoni');
        $this->data['testimonis'] = $this->testimoniModel->findAll();

        return view('admin/page/testimoni', $this->data);
    }

    public function getAdd()
    {
        $this->data['subtitle']    = 'Tambah Testimoni';
        $this->data['breadcrumbs'] = array('Admin', 'Testimoni', 'Tambah Testimoni');

        return view('admin/page/tambahtestimoni', $this->data);
    }

    public function postSave()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'name' => 'required',
            'title' => 'required',
            'testimoni' => 'required',
            'testidate' => 'required',
            'photo' => [
                'uploaded[photo]',
                'max_size[photo, 2048]',
                'is_image[photo]'
            ]
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/testimoni'));
        }

        $img = $this->request->getFile('photo');
        $filename = $img->getRandomName();
        $img->move('assets/img/testimoni', $filename);

        $this->testimoniModel->save([
            'name' => $this->request->getVar('name'),
            'title' => $this->request->getVar('title'),
            'testimonial' => $this->request->getVar('testimoni'),
            'photo' => '/assets/img/testimoni/' . $filename,
            'timestamp' => $this->request->getVar('testidate'),
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Testimoni baru berhasil ditambahkan.']);
        return redirect()->to(base_url('/admin/testimoni'));
    }

    public function postUpdate($idsha)
    {
        $previous = $this->testimoniModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        helper(['form', 'url']);
        if (!$this->validate([
            'name' => 'required',
            'title' => 'required',
            'testimoni' => 'required',
            'testidate' => 'required',
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/testimoni'));
        }

        if ($this->request->getFile('photo')->isValid()) {
            $img = $this->request->getFile('photo');
            $filename = $img->getRandomName();
            $img->move('assets/img/testimoni', $filename);
            unlink(ltrim($previous['photo'], $previous['photo'][0]));
        } else {
            $filename = ltrim($previous['photo'], '/assets/img/testimoni/');
        }

        $this->testimoniModel->update($previous['id'], [
            'name' => $this->request->getVar('name'),
            'title' => $this->request->getVar('title'),
            'testimonial' => $this->request->getVar('testimoni'),
            'photo' => '/assets/img/testimoni/' . $filename,
            'timestamp' => $this->request->getVar('testidate'),
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Testimoni berhasil diedit.']);
        return redirect()->to(base_url('/admin/testimoni'));
    }

    public function postHapus()
    {
        $idsha = $this->request->getVar('idhapus');
        $previous = $this->testimoniModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        $this->testimoniModel->where('substring(sha1(id), 3, 13)', $idsha);

        if ($this->testimoniModel->delete()) {
            unlink(ltrim($previous['photo'], $previous['photo'][0]));
            session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Bingo!</strong> Testimoni berhasil dihapus.']);
            return redirect()->to(base_url('/admin/testimoni'));
        } else {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!!</strong> Gagal menghapus mitra']);
            return redirect()->to(base_url('/admin/testimoni'));
        }
    }
}
