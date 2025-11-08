<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('category_color')) {
    function category_color($slug)
    {
        if (empty($slug)) {
            return '#5b7085'; // default fallback
        }

        // Əvvəlcədən təyin olunmuş rənglər (mövcud CSS-lə eyni)
        $colors = [
            'siyaset'         => '#C62828',
            'iqtisadiyyat'    => '#1565C0',
            'maliye'          => '#30c96a',
            'elm-ve-tehsil'   => '#4527A0',
            'texnologiya'     => '#00838F',
            'cemiyyet'        => '#37474F',
            'medeniyyet'      => '#6A1B9A',
            'turizm'          => '#EF6C00',
            'idman'           => '#4CAF50',
            'xarici-xeberler' => '#283593',
            'tehlil'          => '#821182',
            'rey'             => '#AD1457',
            'kose'            => '#5D4037'
        ];

        // Əgər slug rəng siyahısında varsa — birbaşa onu qaytar
        if (isset($colors[$slug])) {
            return $colors[$slug];
        }

        // Əks halda avtomatik sabit (hash) rəng generasiyası
        $hash  = substr(md5($slug), 0, 6); // məsələn: "turizm" → "2a9d8f"
        $color = '#' . $hash;

        return $color;
    }
}