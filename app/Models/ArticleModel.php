<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'tb_article';
    protected $allowedFields = ['title', 'header_img', 'content', 'article_slug', 'clicked_count', 'writer', 'timestamp', 'last_edit', 'category'];

    public function getCategoryJoinMostRead()
    {
        $builder = $this->db->table('tb_article');
        $builder->select('tb_article.*, tb_categories.*, users.username');
        $builder->orderBy('clicked_count', 'DESC');
        $builder->limit(5);
        $builder->join('tb_categories', 'tb_article.category = tb_categories.id');
        $builder->join('users', 'tb_article.writer = users.id');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getCategoryJoin()
    {
        $builder = $this->db->table('tb_article');
        $builder->select('*');
        $builder->join('tb_categories', 'tb_article.category = tb_categories.id');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getRecent()
    {
        $builder = $this->db->table('tb_article');
        $builder->select('*');
        $builder->orderBy('timestamp', 'DESC');
        $builder->limit(5);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getCompleteArticle($slug)
    {
        $builder = $this->db->table('tb_article');
        $builder->select('tb_article.*, tb_categories.category, tb_categories.slug, users.username');
        $builder->join('tb_categories', 'tb_article.category = tb_categories.id');
        $builder->join('users', 'tb_article.writer = users.id');
        $builder->where('article_slug', $slug);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getViewCategory($slug, $limit = 0, $offset = 1)
    {
        $builder = $this->db->table('tb_article');
        $builder->select('*');
        $builder->join('tb_categories', 'tb_article.category = tb_categories.id');
        $builder->where('slug', $slug);
        $query = $builder->get($limit, $offset);

        return $query->getResultArray();
    }

    public function getRecentFMSM()
    {
        $builder = $this->db->table('tb_article');
        $builder->select('*');
        $builder->join('tb_categories', 'tb_article.category = tb_categories.id');
        $builder->where('slug', 'festival-mbok-sri-mulih');
        $query = $builder->get(5, 0);

        return $query->getResultArray();
    }
}
