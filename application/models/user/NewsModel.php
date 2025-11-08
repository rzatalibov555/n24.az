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
                  categories.name_ru as category_name_ru,
                  categories.cate_slug as cate_slug")
                  
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



    public function get_news_by_slug($slug)
    {
        $lang = $this->session->userdata('lang') ?? 'az';

        if (!in_array($lang, ['az', 'en'])) {
            $lang = 'az';
        }


        $this->db->select("
        n.id,
        n.slug,
        n.img,
        n.video,
        n.created_at,
        n.updated_at,
        n.view_count,
        n.multi_img,
        n.title_{$lang} AS title,
        n.short_description_{$lang} AS short_description,
        n.long_description_{$lang} AS long_description,
        c.id AS category_id,
        c.name_{$lang} AS category_name,
        c.cate_slug AS category_slug,
        a.first_name AS author_first_name,
        a.last_name AS author_last_name,
        a.img AS author_img
        ");
        $this->db->from('news n');
        $this->db->join('categories c', 'c.id = n.category_id', 'left');
        $this->db->join('admins a', 'a.id = n.author_id', 'left');
        $this->db->where('n.slug', urldecode($slug));
        $this->db->where('n.status', 1);

        $row = $this->db->get()->row_array();

        // View count artır
        if ($row) {
            $this->db->set('view_count', 'view_count + 1', FALSE)
                ->where('id', $row['id'])
                ->update('news');
        }

        return $row;
    }


    // public function get_news_by_slug($slug)
    // {
    //     $cache_key = $this->build_cache_key('detail', $slug);

    //     if ($cached = $this->get_cache($cache_key)) {
    //         return $cached;
    //     }

    //     $lang = $this->session->userdata('lang') ?? 'az';
    //     if (!in_array($lang, ['az', 'en'])) $lang = 'az';

    //     $row = $this->db->select("
    //     n.*,
    //     n.title_{$lang} AS title,
    //     n.short_description_{$lang} AS short_description,
    //     n.long_description_{$lang} AS long_description,
    //     c.name_{$lang} AS category_name,
    //     c.cate_slug AS category_slug
    //  ")
    //         ->from('news n')
    //         ->join('categories c', 'c.id = n.category_id', 'left')
    //         ->where('n.slug', $slug)
    //         ->where('n.status', 1)
    //         ->get()
    //         ->row_array();

    //     if ($row) {
    //         $this->set_cache($cache_key, $row);
    //     }

    //     return $row;
    // }


    public function get_news_by_category($category_slug, $limit = null)
    {
        $this->db
            ->select("
            {$this->table_name}.*,
            admins.first_name AS author_first_name,
            admins.last_name AS author_last_name,
            admins.img AS author_img,
            admins.role AS author_role,
            categories.name_az AS category_name_az,
            categories.name_en AS category_name_en,
            categories.name_ru AS category_name_ru,
            categories.cate_slug AS category_slug
        ")
            ->from($this->table_name)
            ->join("admins", "{$this->table_name}.author_id = admins.id", "left")
            ->join("categories", "{$this->table_name}.category_id = categories.id", "left")
            ->where("categories.cate_slug", $category_slug)
            ->where("{$this->table_name}.status", 1) // Yalnız status=1 olan xəbərlər
            ->order_by("{$this->table_name}.created_at", "DESC");

        if ($limit !== null && is_numeric($limit)) {
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }


    // Cache-siz
    // public function get_latest_news($limit = 10)
    // {
    //     $lang = $this->session->userdata('lang') ?? 'az';

    //     if (!in_array($lang, ['az', 'en'])) {
    //         $lang = 'az';
    //     }


    //     $result = $this->db
    //         ->select("id, slug, img, created_at, view_count, title_{$lang} AS title, category_id")
    //         ->from('news')
    //         ->where('status', 1)
    //         // ->order_by('created_at', 'DESC')
    //         ->order_by('view_count', 'DESC')
    //         ->limit($limit)
    //         ->get()
    //         ->result_array();
    //     return $result;
    // }


    // public function get_most_viewed_news($limit = 10, $exclude_id = null)
    // {
    //     $lang = $this->session->userdata('lang') ?? 'az';
    //     if (!in_array($lang, ['az', 'en'])) $lang = 'az';

    //     $this->db
    //         ->select("id, slug, img, created_at, view_count, multi_img, video, title_{$lang} AS title, category_id")
    //         ->from('news')
    //         ->where('status', 1);

    //     if (!empty($exclude_id)) {
    //         $this->db->where('id !=', $exclude_id); // ✅ Mövcud xəbər çıxarılır
    //     }

    //     $result = $this->db
    //         ->order_by('view_count', 'DESC')
    //         ->limit($limit)
    //         ->get()
    //         ->result_array();

    //     // ✅ JSON → array çevirilir ki, multi-img icon işləsin
    //     foreach ($result as &$item) {
    //         $item['multi_img'] = !empty($item['multi_img'])
    //             ? json_decode($item['multi_img'], true)
    //             : [];
    //     }

    //     return $result;
    // }


    // public function get_most_viewed_news($limit = 10, $exclude_id = null, $lang = null)
    // {
    //     if (!$lang) {
    //         $lang = $this->uri->segment(1) ?? 'az';
    //     }
    //     if (!in_array($lang, ['az', 'en'])) {
    //         $lang = 'az';
    //     }

    //     $this->db
    //         ->select("
    //         n.id,
    //         n.slug,
    //         n.img,
    //         n.created_at,
    //         n.updated_at,
    //         n.view_count,
    //         n.multi_img,
    //         n.video,
    //         n.title_{$lang} AS title,
    //         c.cate_slug AS category_slug,
    //         c.name_{$lang} AS category_name
    //     ")
    //         ->from('news n')
    //         ->join('categories c', 'c.id = n.category_id', 'left')
    //         ->where('n.status', 1)
    //         // ✅ Son 7 gün filtri
    //         ->where('n.created_at >=', date('Y-m-d H:i:s', strtotime('-7 days')));

    //     if (!empty($exclude_id)) {
    //         $this->db->where('n.id !=', $exclude_id);
    //     }

    //     $result = $this->db
    //         ->order_by('n.view_count', 'DESC')
    //         ->order_by('n.created_at', 'DESC')
    //         ->order_by('RAND()') // 🔥 Daha cəlbedici müxtəliflik
    //         ->limit($limit)
    //         ->get()
    //         ->result_array();

    //     foreach ($result as &$item) {
    //         $item['multi_img'] = !empty($item['multi_img'])
    //             ? json_decode($item['multi_img'], true)
    //             : [];
    //     }

    //     return $result;
    // }

    public function get_most_viewed_news($limit = 10, $exclude_id = null, $lang = null)
    {
        if (!$lang) {
            $lang = $this->uri->segment(1) ?? 'az';
        }
        if (!in_array($lang, ['az', 'en'])) {
            $lang = 'az';
        }

        $this->db
            ->select("
            n.id,
            n.slug,
            n.img,
            n.created_at,
            n.updated_at,
            n.view_count,
            n.multi_img,
            n.video,
            n.title_{$lang} AS title,
            c.cate_slug AS category_slug,
            c.name_{$lang} AS category_name
        ")
            ->from('news n')
            ->join('categories c', 'c.id = n.category_id', 'left')
            ->where('n.status', 1)
            ->where('n.created_at >=', date('Y-m-d H:i:s', strtotime('-7 days')));

        // ✅ Cari xəbəri istisna et
        if (!empty($exclude_id)) {
            $this->db->where('n.id !=', $exclude_id);
        }

        $result = $this->db
            ->order_by('n.view_count', 'DESC')
            ->order_by('n.created_at', 'DESC')
            ->order_by('RAND()')
            ->limit($limit)
            ->get()
            ->result_array();

        return $result;
    }


    public function get_related_news($category_id, $exclude_id = null, $lang = null)
    {
        // ✅ Dil yoxlaması
        if (!$lang) {
            $lang = $this->uri->segment(1) ?? 'az';
        }
        if (!in_array($lang, ['az', 'en'])) {
            $lang = 'az';
        }

        $this->db
            ->select("
            n.id,
            n.slug,
            n.img,
            n.multi_img,
            n.video,
            n.created_at,
            n.updated_at,
            n.view_count,
            n.title_{$lang} AS title,
            c.cate_slug AS category_slug,
            c.name_{$lang} AS category_name
        ")
            ->from('news n')
            ->join('categories c', 'c.id = n.category_id', 'left')
            ->where('n.status', 1)
            ->where('n.category_id', $category_id);

        // ✅ Cari xəbəri çıxar
        if (!empty($exclude_id)) {
            $this->db->where('n.id !=', $exclude_id);
        }

        return $this->db
            ->order_by('n.view_count', 'DESC')
            ->order_by('n.created_at', 'DESC')
            ->order_by('RAND()')
            ->limit(10)
            ->get()
            ->result_array();
    }


    public function get_other_news($exclude_id = null, $lang = null, $limit = 50)
    {
        if (!$lang) {
            $lang = $this->uri->segment(1) ?? 'az';
        }
        if (!in_array($lang, ['az', 'en'])) {
            $lang = 'az';
        }

        // ✅ DB-də ən böyük id-ni götür
        $max_id = $this->db->select_max('id')->get('news')->row()->id;

        // ✅ Random start id seç
        $random_start = rand(1, max(1, $max_id - $limit));

        $this->db
            ->select("
            n.id,
            n.slug,
            n.img,
            n.multi_img,
            n.video,
            n.created_at,
            n.updated_at,
            n.view_count,
            n.title_{$lang} AS title,
            c.cate_slug AS category_slug,
            c.name_{$lang} AS category_name
        ")
            ->from('news n')
            ->join('categories c', 'c.id = n.category_id', 'left')
            ->where('n.status', 1)
            ->where('n.id >=', $random_start);

        if (!empty($exclude_id)) {
            $this->db->where('n.id !=', $exclude_id);
        }

        $this->db->limit($limit);
        $result = $this->db->get()->result_array();

        // ✅ Çox az xəbər düşərsə → yenidən RAND() fallback
        if (count($result) < $limit) {
            $this->db
                ->select("
                n.id, n.slug, n.img, n.multi_img, n.video,
                n.created_at, n.updated_at, n.view_count,
                n.title_{$lang} AS title,
                c.cate_slug AS category_slug,
                c.name_{$lang} AS category_name
            ")
                ->from('news n')
                ->join('categories c', 'c.id = n.category_id', 'left')
                ->where('n.status', 1);

            if (!empty($exclude_id)) {
                $this->db->where('n.id !=', $exclude_id);
            }

            $result = $this->db
                ->order_by('RAND()')
                ->limit($limit)
                ->get()
                ->result_array();
        }

        return $result;
    }


    public function get_news_by_type_manual($category_slug, $limit = null)
    {
        $this->db
            ->select("
            {$this->table_name}.*,
            admins.first_name AS author_first_name,
            admins.last_name AS author_last_name,
            admins.img AS author_img,
            admins.role AS author_role,
            categories.name_az AS category_name_az,
            categories.name_en AS category_name_en,
            categories.name_ru AS category_name_ru,
            categories.cate_slug AS category_slug
        ")
            ->from($this->table_name)
            ->join("admins", "{$this->table_name}.author_id = admins.id", "left")
            ->join("categories", "{$this->table_name}.category_id = categories.id", "left")
            ->where("type", $category_slug)
            ->where("{$this->table_name}.status", 1) // Yalnız status=1 olan xəbərlər
            ->order_by("{$this->table_name}.created_at", "DESC");

        if ($limit !== null && is_numeric($limit)) {
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }


    // public function increment_views($id)
    // {
    //     $this->db->set('view_count', 'view_count + 1', FALSE)
    //         ->where('id', $id)
    //         ->update('news');
    // }






    // Chach-la
    // public function get_latest_news($limit = 10)
    // {
    //     $cache_key = $this->build_cache_key('latest', $limit);

    //     if ($cached = $this->get_cache($cache_key)) {
    //         return $cached;
    //     }

    //     $lang = $this->session->userdata('lang') ?? 'az';

    //     $data = $this->db->select("id, slug, img, created_at, view_count, title_{$lang} AS title")
    //         ->where('status', 1)
    //         ->order_by('created_at', 'DESC')
    //         ->limit($limit)
    //         ->get('news')
    //         ->result_array();

    //     $this->set_cache($cache_key, $data);

    //     return $data;
    // }



    // // ✅ Smart Cache Key Builder
    // private function build_cache_key($type, $value = '')
    // {
    //     $lang = $this->session->userdata('lang') ?? 'az';
    //     return "news_cache_{$type}_{$value}_{$lang}";
    // }

    // // ✅ Cache yazma helper
    // private function set_cache($key, $data, $ttl = 3600)
    // {
    //     $this->load->driver('cache', ['adapter' => 'file']);
    //     return $this->cache->save($key, $data, $ttl);
    // }

    // // ✅ Cache oxuma helper
    // private function get_cache($key)
    // {
    //     $this->load->driver('cache', ['adapter' => 'file']);
    //     return $this->cache->get($key);
    // }
}
