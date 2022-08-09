<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoriesModel;

class Fmsm extends FrontPage
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
        $this->data['subtitle']             = 'Festival Mbok Sri Mulih';
        $this->data['breadcrumbs']          = array('Beranda', 'Festival Mbok Sri Mulih');

        $pager = service('pager'); //instantiate pager..
        $page = (int)(($this->request->getVar('page') !== null ? $this->request->getVar('page') : 1)); //limit  ie ?page=1 would be set to page=0;
        $perPage =  5; //offset
        $article = $this->articleModel->getViewCategory('festival-mbok-sri-mulih');
        $pager->makeLinks($page, $perPage, count($article));
        $this->data['pager'] = $pager;

        if (!$article) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $this->data['category_name']    = $this->categoriesModel->getWhere(['slug' => 'festival-mbok-sri-mulih'])->getResultArray()[0]['category'];
            $this->data['articles']         = $this->articleModel->getViewCategory('festival-mbok-sri-mulih', $perPage, $perPage * ($page - 1));
        }

        $this->data['articles_recent']      = $this->articleModel->getRecent();
        $this->data['categories']           = $this->categoriesModel->findAll();
        $this->data['description']          = 'Festival Mbok Sri Mulih adalah festival kebudayaan yang rutin dilaksanakan di desa Delanggu Klaten dengan tujuan melestarikan budaya lokal';
        $this->data['keywords']             = 'organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/viewfmsm', $this->data);
    }

    public function getRead($slug)
    {
        $this->data['judul_navbar']         = 'Festival Mbok Sri Mulih';
        $this->data['breadcrumbs']          = array('Beranda', 'Festival Mbok Sri Mulih');

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

        $this->data['articles_recent']      = $this->articleModel->getRecentFMSM();
        $this->data['categories']           = $this->categoriesModel->findAll();

        $this->data['description']  = substr(strip_tags($article['content']), 0, 300);
        $this->data['keywords']     = $article['title'] . ', organisasi kebudayaan, petani milenial, festival mbok sri mulih, delanggu, klaten, rojolele, non profit organization';

        return view('front/readfmsm', $this->data);
    }
}
