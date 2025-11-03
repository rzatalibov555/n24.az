<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('generate_slug')) {
    function generate_slug($string)
    {
            $string = mb_strtolower($string, 'UTF-8');

            $turkish = ['ş','Ş','ı','İ','ç','Ç','ü','Ü','ö','Ö','ğ','Ğ'];
            $english = ['s','s','i','i','c','c','u','u','o','o','g','g'];
            $string = str_replace($turkish, $english, $string);

            $string = mb_strtolower($string, 'UTF-8');

            $string = preg_replace('/[^a-z0-9\s-]/', '', $string);

            $string = preg_replace('/[\s\-]+/', '-', $string);

            $string = trim($string, '-');

            return $string;



    }
}