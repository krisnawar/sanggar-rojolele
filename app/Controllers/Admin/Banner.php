<?php

namespace App\Controllers\Admin;

use App\Models\BannerModel;

class Banner extends AdminPage
{
    protected $bannerModel;

    public function __construct()
    {
        parent::__construct();

        $this->bannerModel = new BannerModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Banner';
        $this->data['breadcrumbs'] = array('Admin', 'Banner');
        $this->data['banners'] = $this->bannerModel->findAll();

        return view('admin/page/banner', $this->data);
    }

    public function postSave()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => [
                'uploaded[photo]',
                'max_size[photo, 2048]',
                'is_image[photo]'
            ]
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/banner'));
        }

        $img = $this->request->getFile('photo');
        $filename = $img->getRandomName();
        $img->move('assets/img/slide', $filename);

        $this->bannerModel->save([
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'path' => '/assets/img/slide/' . $filename,
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Banner baru berhasil ditambahkan.']);
        return redirect()->to(base_url('/admin/banner'));
    }

    public function postUpdate($idsha)
    {
        $previous = $this->bannerModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        helper(['form', 'url']);
        if (!$this->validate([
            'title' => 'required',
            'description' => 'required',
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/banner'));
        }

        if ($this->request->getFile('photo')->isValid()) {
            $img = $this->request->getFile('photo');
            $filename = $img->getRandomName();
            $img->move('assets/img/slide', $filename);
            unlink(ltrim($previous['path'], $previous['path'][0]));
        } else {
            $filename = ltrim($previous['path'], '/assets/img/slide/');
        }

        $this->bannerModel->update($previous['id'], [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'path' => '/assets/img/slide/' . $filename,
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Banner berhasil diedit.']);
        return redirect()->to(base_url('/admin/banner'));
    }

    public function postHapus()
    {
        $idsha = $this->request->getVar('idhapus');
        $previous = $this->bannerModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        $this->bannerModel->where('substring(sha1(id), 3, 13)', $idsha);

        if ($this->bannerModel->delete()) {
            unlink(ltrim($previous['path'], $previous['path'][0]));
            session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Bingo!</strong> Banner berhasil dihapus.']);
            return redirect()->to(base_url('/admin/banner'));
        } else {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!!</strong> Gagal menghapus banner']);
            return redirect()->to(base_url('/admin/banner'));
        }
    }
}
