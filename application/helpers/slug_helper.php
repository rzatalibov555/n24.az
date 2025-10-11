<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('generate_slug')) {
    function generate_slug($string)
    {
        $string = mb_strtolower($string, 'UTF-8');
        $string = str_replace(['ə', 'ö', 'ü', 'ı', 'ğ', 'ç', 'ş'], ['e', 'o', 'u', 'i', 'g', 'c', 's'], $string);
        $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
        $string = preg_replace('/[\s-]+/', '-', trim($string));
        return $string;
    }
}