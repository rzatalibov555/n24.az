<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// if (!function_exists('t')) {
//     function t($key)
//     {
        
//         $CI =& get_instance();
//         $lang = $CI->session->userdata('lang') ?? 'az';

//         $CI->load->database();
//         $CI->db->select('url_route');
//         $CI->db->where('common_code', $key);
//         $CI->db->where('lang', $lang);
//         $query = $CI->db->get('url_translations');

//         if ($query->num_rows() > 0) {
//             return $query->row()->url_route;
//         }
//         return $key;
//     }
// }



defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('t')) {
    /**
     * Çoxdilli URL və ya mətn tərcümə funksiyası
     *
     * @param string $key    - url_translations.common_code dəyəri
     * @return string         - uyğun lang-a görə tərcümə olunmuş route və ya key
     */
    function t($key)
    {
        // Əgər boş gəlirsə, boş qaytar
        if (empty($key)) {
            return '';
        }

        // CodeIgniter instance
        $CI =& get_instance();

        // Sessiyadan cari dili götür, əgər yoxdursa 'az' olaraq təyin et
        $lang = $CI->session->userdata('lang') ?: 'az';

        // Database autoload olunmayıbsa, bir dəfəlik yüklə
        if (!isset($CI->db)) {
            $CI->load->database();
        }

        // Static cache (birdəfəlik yaddaş) — eyni sorğunu təkrar DB-dən oxumamaq üçün
        static $cache = [];

        // Unikal cache açarı (hər dil + hər common_code üçün)
        $cache_key = $lang . '_' . $key;

        // Əgər artıq cache-də varsa, birbaşa qaytar
        if (isset($cache[$cache_key])) {
            return $cache[$cache_key];
        }

        // Sorğunu et
        $query = $CI->db
            ->select('url_route')
            ->where('common_code', $key)
            ->where('lang', $lang)
            ->limit(1)
            ->get('url_translations');

        // Nəticəni yoxla
        $row = $query->row();
        $result = $row ? $row->url_route : $key;

        // Cache-ə əlavə et (bu səhifə boyunca saxlanacaq)
        $cache[$cache_key] = $result;

        return $result;
    }
}
