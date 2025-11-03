<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user/AdminsModel");
        $this->load->model("user/AdvertisingModel");
        $this->load->model("user/CategoriesModel");
        $this->load->model("user/NewsModel");
        $this->load->model("user/SettingsModel");
    }

    public function index()
    {
        // ----------------------------------------------
        $lang = $this->uri->segment(1);
        if (!in_array($lang, ['az', 'en'])) {
            $lang = 'az'; // default dil
        }
        $data['lang'] = $lang;
        // ----------------------------------------------


        // $data['news_list']      = $this->NewsModel->with_author_category();  // all news

        // TOP SIDE
        $data['important_news_1'] = $this->NewsModel->get_news_by_type('important_news_1', 5); // Esas lider (Vacib)    +
        // $data['important_news_2'] = $this->NewsModel->get_news_by_type('important_news_2', 1);
        $data['interview']   = $this->NewsModel->get_news_by_type('interview', 1);  // Asagi sol (Vacib)                -
        $data['important_news_3'] = $this->NewsModel->get_news_by_type('important_news_3', 1); // Asagi orta (Vacib)    +
        $data['important_news_4'] = $this->NewsModel->get_news_by_type('important_news_4', 1); // Asagi sag (Vacib)     +

        $data['important_news_lent'] = $this->NewsModel->get_news_by_type('important_news_lent', 5); // Xeber lenti     +

        $data['daily_news']     = $this->NewsModel->get_news_by_type('daily_news', 1);                                  //?
        $data['general_news']   = $this->NewsModel->get_news_by_type('general_news', 1);                                //?
        //?
        // TOP SIDE





        // kateqoriyalar Start////////////////////////////////////////////////////////////////////////////
        $categories = $this->NewsModel->get_all_active_categories();

        // Menü üçün kateqoriyalar
        $categories = $this->NewsModel->get_all_active_categories();
        $data['main_categories'] = array_slice($categories, 0, 5);
        $data['other_categories'] = array_slice($categories, 5);
        // kateqoriyalar End////////////////////////////////////////////////////////////////////////////
        $data['cate1']   = $this->NewsModel->get_news_by_category('siyaset', 10);
        $data['cate2']   = $this->NewsModel->get_news_by_category('iqtisadiyyat', 10);
        $data['cate3']   = $this->NewsModel->get_news_by_category('maliye', 10);
        $data['cate4']   = $this->NewsModel->get_news_by_category('elm-ve-tehsil', 10);
        // print_r('<pre>');
        // print_r($data['cate4']);
        // die();



        // View-i yükləyirik və məlumatları ötürürük
        $this->load->view("front/pages/index", $data);
    }

    public function about($lang = 'az')
    {
        $data['lang'] = $lang;
        $this->load->view("front/pages/about-us", $data);
    }

    public function category($category_slug, $lang = null)
    {


        // Dil təyin edirik
        $lang = $lang ?? $this->uri->segment(1);
        if (!in_array($lang, ['az', 'en'])) {
            $lang = 'az';
        }
        $data['lang'] = $lang;
        $data['slug'] = $category_slug;

        // Session-a page type yazılır
        $this->session->set_userdata('page_type', 'category_link');


        // kateqoriyalar Start////////////////////////////////////////////////////////////////////////////
        $categories = $this->NewsModel->get_all_active_categories();

        // Menü üçün kateqoriyalar
        $categories = $this->NewsModel->get_all_active_categories();
        $data['main_categories'] = array_slice($categories, 0, 5);
        $data['other_categories'] = array_slice($categories, 5);
        // kateqoriyalar End////////////////////////////////////////////////////////////////////////////


        // Kateqoriyanı tap
        $category = $this->CategoriesModel->get_category_by_slug($category_slug);

        if (!$category) {
            show_404();
        }

        // Kateqoriyaya uyğun xəbərləri gətir
        $data['news_list'] = $this->NewsModel->get_news_by_category($category_slug);
        $data['category'] = $category;

        // View-i yüklə
        $this->load->view("front/pages/categories-style-01", $data);
    }




    public function detail($slug)
    {
        // // ✅ 60 dəqiqə Cache
        // $this->output->cache(1); // 60 deqiqe

        // ----------------------------------------------
        $lang = $this->uri->segment(1);
        if (!in_array($lang, ['az', 'en'])) {
            $lang = 'az'; // default dil
        }
        $data['lang'] = $lang;
        // ----------------------------------------------


        // $lang = $this->session->userdata('lang');
        // $page_type = $this->db->select('url_route')->where('lang',$lang)->where('common_code','news_link')->get('url_translations')->row();

        $this->session->set_userdata('page_type', 'news_link');

        $slug = urldecode($slug);
        $data['slug'] = $slug;


        // ✅ Görüntülənmə artır Model-də edilir
        // $this->NewsModel->increment_views($news['id']); //


        // kateqoriyalar Start////////////////////////////////////////////////////////////////////////////
        // Menü üçün kateqoriyalar
        $categories = $this->NewsModel->get_all_active_categories();
        $data['main_categories'] = array_slice($categories, 0, 5);
        $data['other_categories'] = array_slice($categories, 5);
        // kateqoriyalar End////////////////////////////////////////////////////////////////////////////


        $news = $this->NewsModel->get_news_by_slug($slug);
        if (empty($news)) {
            show_404();
            return;
        }


        // // ✅ Multi image JSON → array (hər iki halda təhlükəsiz)
        // if (!empty($news['multi_img'])) {
        //     if (is_string($news['multi_img'])) {
        //         $news['multi_img'] = json_decode($news['multi_img'], true) ?? [];
        //     } elseif (is_array($news['multi_img'])) {
        //         $news['multi_img'] = array_values($news['multi_img']);
        //     } else {
        //         $news['multi_img'] = [];
        //     }
        // } else {
        //     $news['multi_img'] = [];
        // }

        // ✅ Multi image array (yalnız detail üçün)
        $news['multi_img'] = !empty($news['multi_img'])
            ? (json_decode($news['multi_img'], true) ?: [])
            : [];

        $data['news'] = $news;


        // ✅ Eyni kateqoriyadan 10 xəbər, (self exclude)
        $data['related_news'] = $this->NewsModel->get_related_news($news['category_id'], $news['id'], $lang);

        // ✅ Top 10 ən çox baxılan (özünü çıxmaqla)
        $data['most_viewed_news'] = $this->NewsModel->get_most_viewed_news(10, $news['id'], $lang);

        // shuffle($data['most_viewed_news']);

        $data['other_news'] = $this->NewsModel->get_other_news($news['id'], $lang, 50);


        // ✅ SEO Title / Description (dilə görə)
        $data['page_title'] = $news['title'];
        $data['page_description'] = $news['long_description'] ?? $news['title'];


        // print_r("<pre>");
        // print_r($data['other_news']);
        // die();

        $this->load->view("front/pages/blog-single-01", $data);
    }

    // nakhchivan
    public function category_type($category_slug, $lang = null)
    {
        // print_r('<pre>');
        // // print_r($data['news_list']);
        // echo "sdsd";
        // die();

        // Dil təyin edirik
        $lang = $lang ?? $this->uri->segment(1);
        if (!in_array($lang, ['az', 'en'])) {
            $lang = 'az';
        }
        $data['lang'] = $lang;
        $data['slug'] = $category_slug;

        // Session-a page type yazılır
        $this->session->set_userdata('page_type', 'category_type_link');


        // kateqoriyalar Start////////////////////////////////////////////////////////////////////////////
        $categories = $this->NewsModel->get_all_active_categories();

        // Menü üçün kateqoriyalar
        $categories = $this->NewsModel->get_all_active_categories();
        $data['main_categories'] = array_slice($categories, 0, 5);
        $data['other_categories'] = array_slice($categories, 5);
        // kateqoriyalar End////////////////////////////////////////////////////////////////////////////


        // Kateqoriyanı tap
        // $category = $this->CategoriesModel->get_category_by_slug($category_slug);

        // if (!$category) {
        //     show_404();
        // }

        // Kateqoriyaya uyğun xəbərləri gətir
        $data['news_list'] = $this->NewsModel->get_news_by_type_manual($category_slug);
        // $data['category'] = $category;

        

        // View-i yüklə
        $this->load->view("front/pages/nakhchivan-style-01", $data);
    }

    // zangezur_corridor
}
