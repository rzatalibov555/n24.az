<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriesModel extends ENTITY_Model
{
    protected $table_name = "categories";
    protected $primary_key = "id";

    public function get_category_by_slug($slug)
    {
        return $this->db
            ->where('cate_slug', $slug)
            ->where('status', 1)
            ->get('categories')
            ->row_array();
    }
}
