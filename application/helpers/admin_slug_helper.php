<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('generate_admin_slug')) {
    function generate_admin_slug($string)
    {
        if (empty($string)) return '';

        // Kiçik hərflərə çevir
        $string = mb_strtolower(trim($string), 'UTF-8');

        // Azərbaycan və rus simvollarının transliterasiyası
        $replace = [
            // Azərbaycan hərfləri
            'ə' => 'e', 'Ə' => 'e',
            'ı' => 'i', 'İ' => 'i',
            'ö' => 'o', 'Ö' => 'o',
            'ü' => 'u', 'Ü' => 'u',
            'ç' => 'ch', 'Ç' => 'ch',
            'ş' => 'sh', 'Ş' => 'sh',
            'ğ' => 'gh', 'Ğ' => 'gh',
            // Rus hərfləri
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        ];

        $string = strtr($string, $replace);

        // Yalnız latın hərfləri və rəqəmlər saxla
        $string = preg_replace('/[^a-z0-9\s-]/', '', $string);

        // Boşluqları tire ilə əvəz et
        $string = preg_replace('/[\s\-]+/', '-', $string);

        // Artıq tireləri təmizlə
        $string = trim($string, '-');

        return $string;
    }
}
