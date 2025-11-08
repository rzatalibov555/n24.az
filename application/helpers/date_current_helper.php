<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('format_full_date')) {
    function format_full_date($timestamp = null, $lang = 'az')
    {
        if (!$timestamp) {
            $timestamp = time();
        }

        // =======================
        // AY ADLARI
        // =======================
        $months = [
            'az' => [
                'January' => 'Yanvar', 'February' => 'Fevral', 'March' => 'Mart',
                'April' => 'Aprel', 'May' => 'May', 'June' => 'İyun',
                'July' => 'İyul', 'August' => 'Avqust', 'September' => 'Sentyabr',
                'October' => 'Oktyabr', 'November' => 'Noyabr', 'December' => 'Dekabr'
            ],
            'en' => [
                'January' => 'January', 'February' => 'February', 'March' => 'March',
                'April' => 'April', 'May' => 'May', 'June' => 'June',
                'July' => 'July', 'August' => 'August', 'September' => 'September',
                'October' => 'October', 'November' => 'November', 'December' => 'December'
            ],
            'ru' => [
                'January' => 'Январь', 'February' => 'Февраль', 'March' => 'Март',
                'April' => 'Апрель', 'May' => 'Май', 'June' => 'Июнь',
                'July' => 'Июль', 'August' => 'Август', 'September' => 'Сентябрь',
                'October' => 'Октябрь', 'November' => 'Ноябрь', 'December' => 'Декабрь'
            ]
        ];

        // =======================
        // GÜN ADLARI
        // =======================
        $days = [
            'az' => [
                'Monday' => 'Bazar ertəsi', 'Tuesday' => 'Çərşənbə axşamı',
                'Wednesday' => 'Çərşənbə', 'Thursday' => 'Cümə axşamı',
                'Friday' => 'Cümə', 'Saturday' => 'Şənbə', 'Sunday' => 'Bazar'
            ],
            'en' => [
                'Monday' => 'Monday', 'Tuesday' => 'Tuesday',
                'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday',
                'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday'
            ],
            'ru' => [
                'Monday' => 'Понедельник', 'Tuesday' => 'Вторник',
                'Wednesday' => 'Среда', 'Thursday' => 'Четверг',
                'Friday' => 'Пятница', 'Saturday' => 'Суббота', 'Sunday' => 'Воскресенье'
            ]
        ];

        // =======================
        // Tarixi alırıq
        // =======================
        $day_name = date('l', $timestamp);
        $month_name = date('F', $timestamp);
        $year = date('Y', $timestamp);

        // =======================
        // Əgər dil tapılmazsa, azərbaycan dilinə keç
        // =======================
        if (!isset($days[$lang])) $lang = 'az';

        // =======================
        // Formatlaşdırılmış nəticə
        // =======================
        return $days[$lang][$day_name] . ', ' . $months[$lang][$month_name] . ', ' . $year;
    }
}