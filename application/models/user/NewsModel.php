<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsModel extends ENTITY_Model
{
    protected $table_name = "news";
    protected $primary_key = "id";

    // Butun xeberleri getirir
    public function with_author_category($id = null)
    {
        $this->db
            ->select("$this->table_name.*,
                    admins.first_name as author_first_name,
                    admins.last_name as author_last_name,
                    admins.img as author_img,
                    admins.role as author_role,
                    categories.name_az as category_name_az,
                    categories.name_en as category_name_en,
                    categories.name_ru as category_name_ru")
            ->from($this->table_name)
            ->join("admins", "news.author_id = admins.id", "left")
            ->join("categories", "news.category_id = categories.id", "left")
            ->order_by("$this->table_name.created_at", "DESC"); // DESC ilə sıralama

        if (!($id === null)) {
            $this->db->where("$this->table_name.$this->primary_key", $id);
            return $this->db
                ->get()
                ->row_array();
        }


        return $this->db
            ->get()
            ->result_array();
    }


    /**
     * Xəbərləri müəllif və kateqoriya məlumatları ilə gətirir
     * @param string $type - xəbər tipi, default: 'important_news'
     * @param int|null $limit - neçə xəbər gətiriləcək
     */
    public function get_news_by_type($type, $limit = null)
    {
        $this->db
            ->select("$this->table_name.*,
                  admins.first_name as author_first_name,
                  admins.last_name as author_last_name,
                  admins.img as author_img,
                  admins.role as author_role,
                  categories.name_az as category_name_az,
                  categories.name_en as category_name_en,
                  categories.name_ru as category_name_ru")
            ->from($this->table_name)
            ->join("admins", "news.author_id = admins.id", "left")
            ->join("categories", "news.category_id = categories.id", "left")
            ->where("$this->table_name.type", $type)
            ->order_by("$this->table_name.created_at", "DESC"); // DESC ilə sıralama

        if (!is_null($limit)) {
            $this->db->limit($limit);
        }

        return $this->db->get()->result_array();
    }



    public function get_all_active_categories()
    {
        return $this->db
            ->where('status', 1)
            ->order_by('id', 'ASC')
            ->get('categories')
            ->result_array();
    }

    public function get_categories_by_slug($slug)
    {
        return $this->db
            ->where('slug', $slug)
            ->where('status', 1)
            ->get($this->table)
            ->row_array();
    }
}
