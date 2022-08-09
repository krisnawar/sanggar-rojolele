<?php

namespace App\Controllers;

use App\Models\PhotosModel;
use App\Models\AlbumModel;

class Foto extends FrontPage
{
    protected $photosModel;
    protected $albumModel;

    public function __construct()
    {
        parent::__construct();

        $this->photosModel = new PhotosModel();
        $this->albumModel = new AlbumModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']             = 'Album Foto';
        $this->data['breadcrumbs']          = array('Beranda', 'Media', 'Album Foto');
        $this->data['album']                = $this->albumModel->orderBy('id', 'ASC')->paginate(5);
        $this->data['pager']                = $this->albumModel->pager;

        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']     = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/foto', $this->data);
    }

    public function getViewalbum($slug)
    {
        $this->data['subtitle']             = 'Foto';
        $this->data['breadcrumbs']          = array('Beranda', 'Media', 'Foto');

        if (!$slug) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $id_album = $this->albumModel->getWhere(['title_slug' => $slug])->getResultArray()[0]['id'];
            $photos = $this->photosModel->getWhere(['id_album' => $id_album])->getResultArray();

            if (!$photos) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            } else {
                $this->data['album'] = $this->albumModel->getWhere(['title_slug' => $slug])->getResultArray()[0];
                $this->data['photos'] = $photos;
            }
        }

        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']     = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/viewalbum', $this->data);
    }
}
