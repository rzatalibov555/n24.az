<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsModel extends ENTITY_Model
{
    protected $table_name = "news";
    protected $primary_key = "id";

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
            ->join("categories", "news.category_id = categories.id", "left");

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

    public function slug_exists($slug)
    {
        return $this->db->where('slug', $slug)->count_all_results($this->table_name) > 0;
    }



    // ✅ Cache Təmizləmə — bütün xəbər cache-lərini silir
    // public function clear_cache()
    // {
    //     // Full CI query cache temizlenir
    //     $this->db->cache_delete_all();

    //     if (function_exists('delete_files')) {
    //         // Full page cache təmizlənir
    //         $path = APPPATH . 'cache/';
    //         delete_files($path, TRUE); // TRUE → alt qovluqları da silir
    //     }

    //     log_message('info', '✅ Cache temizlendi (News CRUD)');
    // }




    // public function clear_cache_all()
    // {
    //     // ✅ DB Query Cache
    //     $this->db->cache_delete_all();

    //     // ✅ Full Page Cache - bütün HTML cache fayllarını silir
    //     $cache_path = APPPATH . 'cache/';
    //     $files = glob($cache_path . '*');

    //     foreach ($files as $file) {
    //         if (is_file($file)) {
    //             @unlink($file);
    //         }
    //     }

    //     log_message('info', '✅ FULL CACHE CLEANED: Query + Page Cache Removed.');
    // }





    // // ✅ Smart Cache Cleanup — yalnız news cache silinir
    // public function invalidate_news_cache($slug = '')
    // {
    //     $this->load->driver('cache', ['adapter' => 'file']);
    //     $path = APPPATH . 'cache/';

    //     foreach (glob($path . 'news_cache_*') as $file) {
    //         @unlink($file);
    //     }

    //     log_message('info', "✅ Smart Cache Cleaned! Slug Updated: {$slug}");
    // }
}
