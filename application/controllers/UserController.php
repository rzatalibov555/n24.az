<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user/AdminsModel");
        $this->load->model("user/AdvertisingModel");
        $this->load->model("user/CategoriesModel");
        $this->load->model("user/NewsModel");
        $this->load->model("user/SettingsModel");
    }

    public function index($lang = 'az')
    {
        // Dil dəyişəni view-ə ötürülür
        $data['lang'] = $lang;


        $data['news_list']      = $this->NewsModel->with_author_category();

        $data['important_news_1'] = $this->NewsModel->get_news_by_type('important_news_1', 5); // Esas lider (Vacib)
        // $data['important_news_2'] = $this->NewsModel->get_news_by_type('important_news_2', 1);

        $data['interview']   = $this->NewsModel->get_news_by_type('interview', 1);  // Asagi sol (Vacib)
        
        $data['important_news_3'] = $this->NewsModel->get_news_by_type('important_news_3', 1); // Asagi orta (Vacib)
        $data['important_news_4'] = $this->NewsModel->get_news_by_type('important_news_4', 1); // Asagi sag (Vacib)

        $data['important_news_lent'] = $this->NewsModel->get_news_by_type('important_news_lent', 5); // Xeber lenti


        $data['daily_news']     = $this->NewsModel->get_news_by_type('daily_news', 1);
        $data['general_news']   = $this->NewsModel->get_news_by_type('general_news', 1);
        
        
        

        

        

        // View-i yükləyirik və məlumatları ötürürük
        $this->load->view("front/pages/index", $data);
    }

    public function about($lang = 'az')
    {
        $data['lang'] = $lang;
        $this->load->view("front/pages/about-us", $data);
    }

    public function category($slug, $lang = 'az')
    {
        $data['lang'] = $lang;
        $data['slug'] = $slug;
        $this->load->view("front/pages/categories-style-01", $data);
    }

    public function detail($slug, $lang = 'az')
    {
        $data['lang'] = $lang;
        $data['slug'] = $slug;
        $this->load->view("front/pages/blog-single-01", $data);
    }

}