<?php

namespace App\Controllers\Admin;

use App\Models\ArticleModel;
use App\Models\CategoriesModel;

class Artikel extends AdminPage
{
    protected $articleModel;
    protected $categoriesModel;

    public function __construct()
    {
        parent::__construct();

        $this->articleModel = new ArticleModel();
        $this->categoriesModel = new CategoriesModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Artikel';
        $this->data['breadcrumbs'] = array('Admin', 'Artikel');
        $this->data['articles'] = $this->articleModel->findAll();

        return view('admin/page/artikel', $this->data);
    }

    public function getAdd()
    {
        $this->data['subtitle']    = 'Tambah Artikel';
        $this->data['breadcrumbs'] = array('Admin', 'Artikel', 'Tambah Artikel');
        $this->data['categories']  = $this->categoriesModel->findAll();

        return view('admin/page/tambahartikel', $this->data);
    }

    public function getEdit($idsha)
    {
        $this->data['subtitle']    = 'Edit Artikel';
        $this->data['breadcrumbs'] = array('Admin', 'Artikel', 'Edit Artikel');
        $this->data['categories']  = $this->categoriesModel->findAll();
        $this->data['article'] = $this->articleModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];

        return view('admin/page/editartikel', $this->data);
    }

    public function postSave()
    {
        // dd($this->request->getVar());
        helper(['form', 'url']);
        if (!$this->validate([
            'judul' => 'required',
            'konten' => 'required',
            'foto_headline' => [
                'uploaded[foto_headline]',
                'max_size[foto_headline, 2048]',
                'is_image[foto_headline]'
            ]
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/artikel/add'));
        }

        if ($this->request->getVar('selectcategory') == 'add') {

            $this->categoriesModel->save([
                'category' => $this->request->getVar('newcategory'),
                'slug' => str_replace(' ', '-', strtolower($this->request->getVar('newcategory'))),
            ]);
            // $this->categoriesModel->save('categories', $this->request->getVar('newcategory'));
            $idcategory = $this->categoriesModel->insertID();
        } elseif ($this->request->getVar('selectcategory') == 'choose') {
            $idcategory = $this->request->getVar('categorychosen');
        }

        // dd(date("Y-m-d H:i:s"));

        $img = $this->request->getFile('foto_headline');
        $filename = $img->getRandomName();
        $img->move('assets/img/headline', $filename);

        $this->articleModel->save([
            'title' => $this->request->getVar('judul'),
            'header_img' => '/assets/img/headline/' . $filename,
            'content' => $this->request->getVar('konten'),
            'article_slug' => str_replace(' ', '-', strtolower($this->request->getVar('judul'))),
            'writer' => user_id(),
            'timestamp' => date("Y-m-d H:i:s"),
            'last_edit' => date("Y-m-d H:i:s"),
            'category' => $idcategory,
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Artikel berhasil diinputkan.']);
        return redirect()->to(base_url('/admin/artikel'));
    }

    public function postUpdate($idsha)
    {
        $previous = $this->articleModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        // dd($this->request->getVar());
        helper(['form', 'url']);
        if (!$this->validate([
            'judul' => 'required',
            'konten' => 'required',
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/artikel/edit/' . $idsha));
        }

        if ($this->request->getVar('selectcategory') == 'add') {

            $this->categoriesModel->save([
                'category' => $this->request->getVar('newcategory'),
                'slug' => str_replace(' ', '-', strtolower($this->request->getVar('newcategory'))),
            ]);
            // $this->categoriesModel->save('categories', $this->request->getVar('newcategory'));
            $idcategory = $this->categoriesModel->insertID();
        } elseif ($this->request->getVar('selectcategory') == 'choose') {
            $idcategory = $this->request->getVar('categorychosen');
        }

        if ($this->request->getFile('foto_headline')->isValid()) {
            $img = $this->request->getFile('foto_headline');
            $filename = $img->getRandomName();
            $img->move('assets/img/headline', $filename);
            unlink(ltrim($previous['header_img'], $previous['header_img'][0]));
        } else {
            $filename = ltrim($previous['header_img'], '/assets/img/headline/');
        }

        $this->articleModel->update($previous['id'], [
            'title' => $this->request->getVar('judul'),
            'header_img' => '/assets/img/headline/' . $filename,
            'content' => $this->request->getVar('konten'),
            'article_slug' => str_replace(' ', '-', strtolower($this->request->getVar('judul'))),
            'writer' => user_id(),
            'last_edit' => date("Y-m-d H:i:s"),
            'category' => $idcategory,
        ]);

        // dd($this->articleModel->getLastQuery());

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Artikel berhasil diperbarui.']);
        return redirect()->to(base_url('/admin/artikel'));
    }

    public function postHapus()
    {
        $idsha = $this->request->getVar('idhapus');
        $previous = $this->articleModel->getWhere(['substring(sha1(id), 3, 13)' => $idsha])->getResultArray()[0];
        $this->articleModel->where('substring(sha1(id), 3, 13)', $idsha);

        if ($this->articleModel->delete()) {
            unlink(ltrim($previous['header_img'], $previous['header_img'][0]));
            session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Bingo!</strong> Artikel berhasil dihapus.']);
            return redirect()->to(base_url('/admin/artikel'));
        } else {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!!</strong> Gagal menghapus artikel']);
            return redirect()->to(base_url('/admin/artikel'));
        }
    }
}
