<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// if (!function_exists('switch_language_url')) {
//     function switch_language_url($target_lang) {

//         echo 'asdasdasd';
//         exit();
//         $CI =& get_instance();
//         $CI->load->helper('url');
//         $CI->load->database();

//         // Mövcud URI seqmentlərini götür
//         $segments = $CI->uri->segment_array();

//         // İlk seqment dildirsə sil
//         if (isset($segments[1]) && in_array($segments[1], ['az','en'])) {
//             array_shift($segments);
//             $segments = array_values($segments);
//         }

//         // Session-u müvəqqəti override edirik
//         $current_lang = $CI->session->userdata('lang') ?? 'az';

//         $current_route = $segments[0] ?? '';
//         if ($current_route) {
//             $query = $CI->db->query("
//                 SELECT url_route 
//                 FROM url_translations 
//                 WHERE common_code = (
//                     SELECT common_code 
//                     FROM url_translations 
//                     WHERE LOWER(TRIM(url_route)) = ? AND lang = ?
//                 ) 
//                 AND lang = ?
//             ", [strtolower(trim($current_route)), $current_lang, $target_lang]);

//             if ($query->num_rows() > 0) {
//                 $segments[0] = $query->row()->url_route;
//             }
//         }

//         // Burada session-u dəyişdirmirik, yalnız link üçün
//         return base_url($target_lang . '/' . implode('/', $segments));
//     }
// }


// if (!function_exists('switch_language_url')) {
//     function switch_language_url($target_lang) {
//         $CI =& get_instance();
//         $CI->load->helper('url');
//         $CI->load->database();

//         $segments = $CI->uri->segment_array();

//         // Cari dil (ilk seqment)
//         $current_lang = isset($segments[1]) && in_array($segments[1], ['az','en']) ? $segments[1] : 'az';
        

       

//         // Əgər ilk seqment dildirsə, sil və segments-i yenidən indekslə
//         if (isset($segments[1]) && in_array($segments[1], ['az','en'])) {
//             array_shift($segments);
//             $segments = array_values($segments);
//         }

//         // İlk seqment hazırki route
//         $current_route = $segments[0] ?? '';

//         // URL translations cədvəlindən avtomatik mapping
//         if ($current_route) {
//             $query = $CI->db->query("
//                 SELECT url_route 
//                 FROM url_translations 
//                 WHERE common_code = (
//                     SELECT common_code 
//                     FROM url_translations 
//                     WHERE LOWER(TRIM(url_route)) = ? AND lang = ?
//                 ) 
//                 AND lang = ?
//             ", [strtolower(trim($current_route)), $current_lang, $target_lang]);

//             if ($query->num_rows() > 0) {
//                 $segments[0] = $query->row()->url_route;
//             }
//         }

//         // Yeni URL yarat

//         $CI->session->set_userdata('lang', $current_lang);
//         return base_url($target_lang . '/' . implode('/', $segments));
//     }
// }


// if (!function_exists('switch_language_url')) {
//     function switch_language_url($target_lang) {
//         $CI =& get_instance();
//         $CI->load->helper('url');

//         $segments = $CI->uri->segment_array();

//         // Cari dil
//         $current_lang = isset($segments[1]) && in_array($segments[1], ['az','en']) ? $segments[1] : 'az';

//         // Əgər ilk segment dildirsə, sil
//         if (isset($segments[1]) && in_array($segments[1], ['az','en'])) {
//             array_shift($segments);
//             $segments = array_values($segments);
//         }

//         $current_route = $segments[0] ?? '';

//         // URL translations cədvəlindən avtomatik mapping (istəyə görə)
//         if ($current_route) {
//             $CI->load->database();
//             $query = $CI->db->query("
//                 SELECT url_route 
//                 FROM url_translations 
//                 WHERE common_code = (
//                     SELECT common_code 
//                     FROM url_translations 
//                     WHERE LOWER(TRIM(url_route)) = ? AND lang = ?
//                 ) 
//                 AND lang = ?
//             ", [strtolower(trim($current_route)), $current_lang, $target_lang]);

//             if ($query->num_rows() > 0) {
//                 $segments[0] = $query->row()->url_route;
//             }
//         }

//         // Yeni URL
//         return base_url($target_lang . '/' . implode('/', $segments));
//     }
// }










// if (!function_exists('switch_language_url')) {
//     /**
//      * Cari URL-i saxlayaraq dili dəyişdirir (tam avtomatik, manual mapping yoxdur)
//      *
//      * @param string $target_lang 'az' və ya 'en'
//      * @return string Yeni URL
//      */
//     function switch_language_url($target_lang) {
//         $CI =& get_instance();
//         $CI->load->helper('url');
//         $CI->load->database();

//         // Cari dil (session-dan və ya default 'az')
//         $current_lang = $CI->session->userdata('lang') ?? 'az';

//         // URL segmentlərini götür
//         $segments = $CI->uri->segment_array();

//         // Əgər ilk segment dil kodudursa, sil
//         if (isset($segments[1]) && in_array($segments[1], ['az','en'])) {
//             array_shift($segments);
//             $segments = array_values($segments);
//         }

//         // İlk segment hazırki route
//         $current_route = $segments[0] ?? '';

//         // Database mapping
//         if ($current_route) {
//             $query = $CI->db->query("
//                 SELECT url_route 
//                 FROM url_translations 
//                 WHERE common_code = (
//                     SELECT common_code 
//                     FROM url_translations 
//                     WHERE LOWER(TRIM(url_route)) = ? AND lang = ?
//                 ) 
//                 AND lang = ?
//             ", [strtolower(trim($current_route)), $current_lang, $target_lang]);

//             if ($query->num_rows() > 0) {
//                 $segments[0] = $query->row()->url_route;
//             }
//         }

//         // Yeni URL yarat
//         return base_url($target_lang . '/' . implode('/', $segments));
//     }
// }













// if (!function_exists('switch_language_url')) {
//     /**
//      * Cari URL-i saxlayaraq dili dəyişdirir.
//      *
//      * @param string $target_lang 'az' və ya 'en'
//      * @return string Yeni URL
//      */
//     function switch_language_url($target_lang) {
//         $CI =& get_instance();
//         $CI->load->helper('url');
//         $CI->load->database();

//         // URL segmentlərini götür
//         $segments = $CI->uri->segment_array();

//         // Cari dil (ilk segmentdədirsə)
//         $current_lang = isset($segments[1]) && in_array($segments[1], ['az','en']) ? $segments[1] : 'az';

//         // Əgər ilk segment dil kodudursa, sil
//         if (isset($segments[1]) && in_array($segments[1], ['az','en'])) {
//             array_shift($segments);
//             $segments = array_values($segments);
//         }

//         // İlk seqment hazırki route
//         $current_route = $segments[0] ?? '';

//         // URL translations cədvəlindən avtomatik mapping
//         if ($current_route) {
//             $query = $CI->db->query("
//                 SELECT url_route 
//                 FROM url_translations 
//                 WHERE common_code = (
//                     SELECT common_code 
//                     FROM url_translations 
//                     WHERE LOWER(TRIM(url_route)) = ? AND lang = ?
//                 ) 
//                 AND lang = ?
//             ", [strtolower(trim($current_route)), $current_lang, $target_lang]);

//             if ($query->num_rows() > 0) {
//                 $segments[0] = $query->row()->url_route;
//             }
//         }

//         // Manual fallback mapping (xeber ↔ news)
//         if (isset($segments[0])) {
//             if ($current_lang == 'az' && $target_lang == 'en' && $segments[0] == 'xeber') {
//                 $segments[0] = 'news';
//             } elseif ($current_lang == 'en' && $target_lang == 'az' && $segments[0] == 'news') {
//                 $segments[0] = 'xeber';
//             }
//         }

//         // Yeni URL yarat
//         $new_url = base_url($target_lang . '/' . implode('/', $segments));
//         return $new_url;
//     }
// }







// function switch_language_url($target_lang) {
//     $CI =& get_instance();
//     $CI->load->helper('url');
//     $CI->load->database();

//     $current_lang = $CI->session->userdata('lang') ?? 'az';
//     $segments = $CI->uri->segment_array();

//     // Əgər ilk seqment dildirsə (az|en), onu sil
//     if (isset($segments[1]) && in_array($segments[1], ['az', 'en'])) {
//         array_shift($segments);
//         $segments = array_values($segments);
//     }

//     $current_route = $segments[0] ?? '';

//     // Tərcümə tapmaq üçün query
//     if ($current_route) {
//         $query = $CI->db->query("
//             SELECT url_route 
//             FROM url_translations 
//             WHERE common_code = (
//                 SELECT common_code 
//                 FROM url_translations 
//                 WHERE LOWER(TRIM(url_route)) = ? AND lang = ?
//             ) 
//             AND lang = ?
//         ", [strtolower(trim($current_route)), $current_lang, $target_lang]);

//         if ($query->num_rows() > 0) {
//             $segments[0] = $query->row()->url_route;
//         }
//     }

//     // Yeni URL yarat
//     $new_url = base_url($target_lang . '/' . implode('/', $segments));
//     return $new_url;
// }