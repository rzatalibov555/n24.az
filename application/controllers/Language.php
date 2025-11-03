<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// class Language extends CI_Controller {
//     public function switch($lang_code = 'az') {
//         $allowed = ['az','en'];
//         if (!in_array($lang_code, $allowed)) $lang_code = 'az';

//         // Session-a dil əlavə edilir
//         $this->session->set_userdata('lang', $lang_code);

//         // Session məlumatını dərhal yaz
//         session_write_close();

//         // Referer URL-i al
//         $ref = $_SERVER['HTTP_REFERER'] ?? base_url();
//         $base = base_url();

//         // Base URL-i silərək yalnız path qalır
//         $ref = str_replace($base.'az/', '', $ref);
//         $ref = str_replace($base.'en/', '', $ref);
//         $ref = str_replace($base, '', $ref);

//         // Redirect yeni dil ilə
//         redirect($base.$lang_code.'/'.$ref);
//     }
// }


// ----------------------------------------- DUZ OLAN START -----------------------------------------------------------------------------
class Language extends CI_Controller {

    public function switch($lang_code = 'az') {
        $allowed = ['az', 'en'];
        if (!in_array($lang_code, $allowed)) $lang_code = 'az';

        // Yeni dili session-a yaz
        $this->session->set_userdata('lang', $lang_code);

        $ref = $_SERVER['HTTP_REFERER'] ?? base_url();
        $base = rtrim(base_url(), '/');
        $path = str_replace($base, '', $ref);
        $segments = array_filter(explode('/', trim($path, '/')));

        // Əgər ilk seqment dil kodudursa, sil
        if (isset($segments[0]) && in_array($segments[0], ['az','en'])) {
            array_shift($segments);
        }

        // Ana səhifədəsə (yəni $segments boşdursa)
        if (empty($segments)) {
            redirect($base . '/' . $lang_code . '/');
            return;
        }

        // Əgər session-da page_type varsa, uyğun route tap
        $page_type = $this->session->userdata('page_type');
        if (!empty($page_type)) {
            $page_type_row = $this->db
                ->select('url_route')
                ->where('lang', $lang_code)
                ->where('common_code', $page_type)
                ->get('url_translations')
                ->row();

            if ($page_type_row && !empty($page_type_row->url_route)) {
                $segments[0] = $page_type_row->url_route;
            }
        }

        // Session təmizlə
        $this->session->unset_userdata('page_type');

        // Yeni URL qur
        $new_url = rtrim($base, '/') . '/' . $lang_code . '/' . implode('/', $segments);
        redirect($new_url);
    }
}
// ----------------------------------------- DUZ OLAN SON -----------------------------------------------------------------------------

/////////////////////////////////    ////////////////////////////////

// class Language extends CI_Controller {

//     public function switch($lang_code = 'az') {
//         $allowed = ['az', 'en'];
//         if (!in_array($lang_code, $allowed)) $lang_code = 'az';

//         // Yeni dil session-a yaz
//         $this->session->set_userdata('lang', $lang_code);

//         // Keçid edilən səhifəni tap
//         $ref = $_SERVER['HTTP_REFERER'] ?? base_url();
//         $base = rtrim(base_url(), '/');
//         $path = str_replace($base, '', $ref);
//         $segments = array_filter(explode('/', trim($path, '/')));

//         // Əgər ilk seqment dil-seqmentidirsə, sil
//         if (isset($segments[0]) && in_array($segments[0], ['az', 'en'])) {
//             array_shift($segments);
//         }

//         // Yadda saxlanılan səhifə tipinə əsasən URL tap
//         $page_type_code = $this->session->userdata('page_type');
//         $page_type = $this->db->select('url_route')
//             ->where('lang', $lang_code)
//             ->where('common_code', $page_type_code)
//             ->get('url_translations')
//             ->row();

//         // Əgər tərcümə varsa, seqmenti dəyiş
//         if ($page_type && !empty($page_type->url_route)) {
//             $segments[0] = $page_type->url_route;
//         }

//         // Session təmizlə
//         $this->session->unset_userdata('page_type');

//         // Yeni URL qur və yönləndir
//         $new_url = rtrim($base, '/') . '/' . $lang_code . '/' . implode('/', $segments);
//         redirect($new_url);
//     }
// }
/////////////////////////////////    ////////////////////////////////










// ===========================--------------------------============================
// class Language extends CI_Controller {

//     public function switch($lang_code = 'az') {
//         $allowed = ['az','en'];
//         if (!in_array($lang_code, $allowed)) $lang_code = 'az';

//         // Session-a yeni dili yaz
//         $this->session->set_userdata('lang', $lang_code);

//         $ref = $_SERVER['HTTP_REFERER'] ?? base_url();
//         $base = base_url();

//         // Base URL-i sil və path seqmentlərini götür
//         $path = str_replace($base, '', $ref);
//         $segments = explode('/', trim($path, '/'));

//         // Əgər ilk seqment dil-seqmentidirsə, sil
//         if (isset($segments[0]) && in_array($segments[0], ['az','en'])) {
//             array_shift($segments);
//         }

        
//         $page_type = $this->db->select('url_route')->where('lang',$lang_code)->where('common_code',$this->session->userdata('page_type'))->get('url_translations')->row();

//         $segments['0'] = $page_type->url_route;
        
//         // Yeni URL-i yarat
//         $new_url = $base . $lang_code . '/' . implode('/', $segments);

//         $this->session->unset_userdata('page_type');

//         redirect($new_url);
//     }
// }
// ===========================--------------------------============================










// class Language extends CI_Controller
// {
//     public function switch($lang_code = 'az')
//     {

//         $allowed = ['az','en'];
//         if (!in_array($lang_code, $allowed)) {
//             $lang_code = 'az';
//         }

//         $this->session->set_userdata('lang', $lang_code);

//         $ref = $_SERVER['HTTP_REFERER'];

//         $base = base_url();

//         $ref = str_replace($base.'az/', '', $ref);
//         $ref = str_replace($base.'en/', '', $ref);
//         $ref = str_replace($base, '', $ref);

//         redirect($base.$lang_code.'/'.$ref);
//     }





// defined('BASEPATH') OR exit('No direct script access allowed');

// class Language extends CI_Controller
// {
  
//     public function switch($lang_code = 'az')
//     {
      
//         $allowed = ['az','en'];
//         if (!in_array($lang_code, $allowed)) {
//             $lang_code = 'az';
//         }

//         // Sessiyada dili qeyd et
//         $this->session->set_userdata('lang', $lang_code);

//         // Cari səhifə URL-i (referer)
//         $ref = $this->input->server('HTTP_REFERER') ?? base_url();

//         // Base URL-ləri çıxart
//         $ref = str_replace([base_url().'az/', base_url().'en/', base_url()], '', $ref);

//         // Redirect et
//         redirect(base_url($lang_code.'/'.$ref));
//     }
// }









// ========================================================================


    



// }
