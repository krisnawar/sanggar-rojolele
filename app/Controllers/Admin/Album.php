<?php

namespace App\Controllers\Admin;

use App\Models\AlbumModel;
use App\Models\PhotosModel;

class Album extends AdminPage
{
    protected $albumModel;
    protected $photosModel;

    public function __construct()
    {
        parent::__construct();

        $this->albumModel = new AlbumModel();
        $this->photosModel = new PhotosModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Album';
        $this->data['breadcrumbs'] = array('Admin', 'Album');
        $this->data['albums'] = $this->albumModel->findAll();

        return view('admin/page/album', $this->data);
    }

    public function getAdd()
    {
        $this->data['subtitle']    = 'Tambah Album';
        $this->data['breadcrumbs'] = array('Admin', 'Album', 'Tambah Album');

        return view('admin/page/tambahalbum', $this->data);
    }

    public function getEdit($idsha)
    {
        $this->data['subtitle']    = 'Edit Album';
        $this->data['breadcrumbs'] = array('Admin', 'Album', 'Edit Album');
        $this->data['album'] = $this->albumModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];

        return view('admin/page/editalbum', $this->data);
    }

    public function getUpload($idsha)
    {
        $this->data['subtitle']    = 'Upload Foto';
        $this->data['breadcrumbs'] = array('Admin', 'Album', 'Upload Foto');
        $this->data['album'] = $this->albumModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];

        return view('admin/page/upload', $this->data);
    }

    public function getShow($idsha)
    {
        $this->data['subtitle']    = 'Daftar Foto';
        $this->data['breadcrumbs'] = array('Admin', 'Album', 'Daftar Foto');
        $this->data['album'] = $this->albumModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        $this->data['photos'] = $this->photosModel->getWhere(['substring(sha1(id_album), 3, 13)' => $idsha])->getResultArray();

        return view('admin/page/show', $this->data);
    }

    public function postDoUpload($id)
    {
        $dataAlbum = $this->albumModel->getWhere(['id' => $id])->getResultArray()[0];

        $imgs = $this->request->getFiles();
        $filename = [];
        foreach ($imgs as $img) {
            $filename = $img->getRandomName();
            $img->move('assets/img/album/' . $dataAlbum['id'] . '/', $filename);

            $this->photosModel->save([
                'alt' => 'Foto pada album ' . $dataAlbum['title'],
                'path' => '/assets/img/album/' . $dataAlbum['id'] . '/' . $filename,
                'id_album' => $id,
            ]);
        }
    }

    public function postSave()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/album/add'));
        }

        $this->albumModel->save([
            'title' => $this->request->getVar('judul'),
            'title_slug' => str_replace(' ', '-', strtolower($this->request->getVar('judul'))),
            'description' => $this->request->getVar('deskripsi'),
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Album baru berhasil ditambahkan.']);
        return redirect()->to(base_url('/admin/album'));
    }

    public function postUpdate($idsha)
    {
        $previous = $this->albumModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        helper(['form', 'url']);
        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/album/add'));
        }

        $this->albumModel->update($previous['id'], [
            'title' => $this->request->getVar('judul'),
            'title_slug' => str_replace(' ', '-', strtolower($this->request->getVar('judul'))),
            'description' => $this->request->getVar('deskripsi'),
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Detail album berhasil diperbarui.']);
        return redirect()->to(base_url('/admin/album'));
    }

    public function postHapus()
    {
        $idsha = $this->request->getVar('idhapus');
        $this->albumModel->where('substring(sha1(id), 3, 13)', $idsha);

        if ($this->albumModel->delete()) {
            session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Bingo!</strong> Album berhasil dihapus.']);
            $this->afterHapus();
            return redirect()->to(base_url('/admin/album'));
        } else {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!!</strong> Gagal menghapus album']);
            return redirect()->to(base_url('/admin/album'));
        }
    }

    public function afterHapus()
    {
        $listDeleted = $this->photosModel->getWhere('id_album', null)->getResultArray();

        foreach ($listDeleted as $ld) {
            unlink(ltrim($ld['path'], $ld['path'][0]));
        }

        $this->photosModel->where('id_album', null);
        $this->photosModel->delete();
    }
}
