<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// if (!function_exists('format_news_date')) {
//     function format_news_date($datetime)
//     {
//         if (!$datetime) return '';

//         $time = strtotime($datetime);
//         $today = strtotime('today');
//         $yesterday = strtotime('yesterday');

//         // Dil (session-dan götürək)
//         $CI = &get_instance();
//         $lang = $CI->session->userdata('lang') ?? 'az';

//         // Tərcümə sözləri
//         $labels = [
//             'az' => ['today' => 'Bugün', 'yesterday' => 'Dünən'],
//             'en' => ['today' => 'Today', 'yesterday' => 'Yesterday'],
//         ];

//         $label_today = $labels[$lang]['today'];
//         $label_yesterday = $labels[$lang]['yesterday'];

//         if ($time >= $today) {
//             return "$label_today • " . date("H:i", $time);
//         }
//         elseif ($time >= $yesterday) {
//             return "$label_yesterday • " . date("H:i", $time);
//         }
//         elseif (date("Y", $time) == date("Y")) {
//             return date("d M • H:i", $time);
//         }

//         return date("d.m.Y • H:i", $time);
//     }
// }



// function format_news_date($date)
// {
//     $time = strtotime($date);
//     $hours = date('H:i', $time);

//     $today = strtotime(date('Y-m-d'));
//     $yesterday = strtotime(date('Y-m-d', strtotime('-1 days')));

//     // Aylar
//     $months = [
//         "01" => "YAN", "02" => "FEV", "03" => "MAR", "04" => "APR",
//         "05" => "MAY", "06" => "İYN", "07" => "İYL", "08" => "AVQ",
//         "09" => "SEN", "10" => "OKT", "11" => "NOY", "12" => "DEK"
//     ];

//     $day   = date('d', $time);
//     $month = $months[date('m', $time)];

//     // ✅ Bugün
//     if ($time >= $today) {
//         return "<i class='fa-regular fa-calendar'></i> BU GÜN  <i class='fa-regular fa-clock'></i> $hours";
//     }

//     // ✅ Dünən
//     if ($time >= $yesterday) {
//         return "<i class='fa-regular fa-calendar'></i> DÜNƏN  <i class='fa-regular fa-clock'></i> $hours";
//     }

//     // ✅ Köhnə tarixlər
//     return "<i class='fa-regular fa-calendar'></i> $day $month  <i class='fa-regular fa-clock'></i> $hours";
// }



function format_news_date($date)
{
    // ✅ CI obyektini helper daxilində çağırırıq
    $CI =& get_instance();

    // ✅ Dil URI-dən gəlir
    $lang = $CI->uri->segment(1);
    if (!in_array($lang, ['az', 'en'])) {
        $lang = 'az';
    }

    $time = strtotime($date);
    $hours = date('H:i', $time);

    $today = strtotime(date('Y-m-d'));
    $yesterday = strtotime(date('Y-m-d', strtotime('-1 days')));

    // ✅ Azərbaycan ayları
    $months_az = [
        "01" => "YAN","02" => "FEV","03" => "MAR","04" => "APR",
        "05" => "MAY","06" => "İYN","07" => "İYL","08" => "AVQ",
        "09" => "SEN","10" => "OKT","11" => "NOY","12" => "DEK"
    ];

    // ✅ İngilis ayları
    $months_en = [
        "01" => "JAN","02" => "FEB","03" => "MAR","04" => "APR",
        "05" => "MAY","06" => "JUN","07" => "JUL","08" => "AUG",
        "09" => "SEP","10" => "OCT","11" => "NOV","12" => "DEC"
    ];

    $month_list = $lang == 'en' ? $months_en : $months_az;

    $day = date('d', $time);
    $month = $month_list[date('m', $time)];
    $year = date('Y', $time);

    // ✅ Dilə görə format
    $todayText = ($lang == 'en') ? "TODAY" : "BU GÜN";
    $yesterdayText = ($lang == 'en') ? "YESTERDAY" : "DÜNƏN";

    // ✅ BUGÜN
    if ($time >= $today) {
        return "<i class='fa-regular fa-calendar greyColor' style='margin-right:0px;'></i> $todayText ".
               "/ <i class='fa-regular fa-clock greyColor' style='margin-right:0px;'></i> $hours";
    }

    // ✅ DÜNƏN
    if ($time >= $yesterday) {
        return "<i class='fa-regular fa-calendar greyColor' style='margin-right:0px;'></i> $yesterdayText ".
               "/ <i class='fa-regular fa-clock greyColor' style='margin-right:0px;'></i> $hours";
    }

    // ✅ Keçmiş tarix — İllə birlikdə
    return "<i class='fa-regular fa-calendar greyColor' style='margin-right:0px;'></i> $day $month $year ".
           "/ <i class='fa-regular fa-clock greyColor' style='margin-right:0px;'></i> $hours";
}






// if (!function_exists('format_news_date_text')) {

//     function format_news_date_text($date, $lang = 'az')
//     {
//         if (!$date) return '';

//         $time = strtotime($date);
//         $today = strtotime('today');
//         $yesterday = strtotime('yesterday');
//         $hours = date('H:i', $time);

//         // ✅ Dil yoxlaması
//         if (!in_array($lang, ['az', 'en'])) {
//             $lang = 'az';
//         }

//         // ✅ Mətn tərcümə
//         $labelToday = [
//             "az" => "Bugün",
//             "en" => "Today"
//         ][$lang];

//         $labelYesterday = [
//             "az" => "Dünən",
//             "en" => "Yesterday"
//         ][$lang];

//         // ✅ Aylar tərcümə
//         $months = [
//             "az" => [
//                 "01"=>"YAN","02"=>"FEV","03"=>"MAR","04"=>"APR","05"=>"MAY","06"=>"İYN",
//                 "07"=>"İYL","08"=>"AVQ","09"=>"SEN","10"=>"OKT","11"=>"NOY","12"=>"DEK"
//             ],
//             "en" => [
//                 "01"=>"JAN","02"=>"FEB","03"=>"MAR","04"=>"APR","05"=>"MAY","06"=>"JUN",
//                 "07"=>"JUL","08"=>"AUG","09"=>"SEP","10"=>"OCT","11"=>"NOV","12"=>"DEC"
//             ]
//         ];

//         // ✅ Bugün
//         if ($time >= $today) {
//             return "$labelToday|$hours";
//         }

//         // ✅ Dünən
//         if ($time >= $yesterday) {
//             return "$labelYesterday|$hours";
//         }

//         // ✅ Köhnə tarix
//         $day = date('d', $time);
//         $month = $months[$lang][date('m', $time)];
//         $year = date('Y', $time);

//         return "$day $month $year|$hours";
//     }
// }