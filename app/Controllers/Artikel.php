<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoriesModel;

class Artikel extends FrontPage
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
        $this->data['subtitle']             = 'Artikel';
        $this->data['breadcrumbs']          = array('Beranda', 'Artikel');
        $this->data['articles']             = $this->articleModel->orderBy('id', 'DESC')->paginate(3);
        $this->data['pager']                = $this->articleModel->pager;
        $this->data['articles_recent']      = $this->articleModel->getRecent();
        $this->data['categories']           = $this->categoriesModel->findAll();

        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']             = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/artikel', $this->data);
    }

    public function getRead($slug = false)
    {
        $this->data['judul_navbar']         = 'Artikel';
        $this->data['breadcrumbs']          = array('Beranda', 'Artikel', 'Baca Artikel');

        if (!$slug) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $article = $this->articleModel->getCompleteArticle($slug)[0];

            if (!$article) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            } else {
                $this->data['article'] = $article;
                $currview = $article['clicked_count'];
                $now = $currview + 1;
                $this->articleModel->update($article['id'], [
                    'clicked_count' => $now
                ]);
                $this->data['subtitle']             = $article['title'];
            }
        }

        $this->data['articles_recent']      = $this->articleModel->getRecent();
        $this->data['categories']           = $this->categoriesModel->findAll();

        $this->data['description']          = substr(strip_tags($article['content']), 0, 300);
        $this->data['keywords']             = $article['title'] . ', organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/readartikel', $this->data);
    }

    public function getViewcategory($slug = false)
    {
        $this->data['subtitle']             = 'Artikel';
        $this->data['breadcrumbs']          = array('Beranda', 'Artikel', 'Kategori');

        if (!$slug) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $pager = service('pager'); //instantiate pager..
            $page = (int)(($this->request->getVar('page') !== null ? $this->request->getVar('page') : 1)); //limit  ie ?page=1 would be set to page=0;
            $perPage =  5; //offset
            $article = $this->articleModel->getViewCategory($slug);
            $pager->makeLinks($page, $perPage, count($article));
            $this->data['pager'] = $pager;

            if (!$article) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            } else {
                $this->data['category_name']    = $this->categoriesModel->getWhere(['slug' => $slug])->getResultArray()[0]['category'];
                $this->data['articles']         = $this->articleModel->getViewCategory($slug, $perPage, $perPage * ($page - 1));
            }
        }

        $this->data['articles_recent']      = $this->articleModel->getRecent();
        $this->data['categories']           = $this->categoriesModel->findAll();

        $this->data['description']  = 'Sanggar Rojolele merupakan kelompok kolektif yang dikelola pemuda desa Kaibon, Delanggu, Klaten, berfokus pada Seni Budaya kerakyatan, literasi, kreatifitas daur ulang dan kegiatan dunia anak-anak';
        $this->data['keywords']             = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/viewcategory', $this->data);
    }
}
