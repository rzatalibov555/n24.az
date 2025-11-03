<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/*<================> System Routes <================>*/
// $route["default_controller"] = "DefaultController";


// // RZA Start
// $route["default_controller"] = "UserController";
// $route["index"]["GET"] = "UserController/index";
// $route["about"]["GET"] = "UserController/about";
// $route["category/(:any)"]["GET"] = "UserController/category/$1";
// // $route["detail/(:any)"]["GET"] = "UserController/detail/$1";
// // RZA End



// // multi





// $route['^(en|az)/(news|xeber)/(:any)'] = 'UserController/detail/$3';

// $route['^(en|az)/(.+)$'] = "$2";

// $route['^(en|az)$'] = $route['default_controller'];

// // multi


// ==========================================================
// $route['default_controller'] = 'UserController';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;

// // Ana səhifə — default olaraq Azərbaycan dilində
// $route['^$'] = 'UserController/index/az';

// // Dilə əsasən ana səhifə
// $route['^(az|en)$'] = 'UserController/index/$1';

// // Xəbər detal səhifəsi
// $route['^(az|en)/(news|xeber)/(:any)$'] = 'UserController/detail/$3';

// // Kateqoriya səhifəsi
// $route['^(az|en)/category/(:any)$'] = 'UserController/category/$3';

// // Haqqımızda səhifəsi
// $route['^(az|en)/about$'] = 'UserController/about/$1';

// // Digər çoxdilli səhifələr
// $route['^(az|en)/(.+)$'] = '$2';


$route['default_controller'] = 'UserController';

// Detail səhifələr
$route['^(en|az)/(news|xeber)/(:any)$'] = 'UserController/detail/$3';
$route['^(en|az)/(category|kateqoriya)/(:any)$'] = 'UserController/category/$3/$1';

// Kateqoriya və digər spesifik səhifələr (məsələn, about, category)
$route['^(en|az)/about'] = 'UserController/about';
// $route['^(en|az)/category/(:any)'] = 'UserController/category/$2';

$route['^(en|az)/(section|bolme)/(:any)$'] = 'UserController/category_type/$3/$1';


// Generic fallback (digər hər şey)
$route['^(en|az)/(.+)$'] = "$2";

// Əsas səhifə üçün
$route['^(en|az)$'] = 'UserController/index';
$route['language/switch/(:any)'] = 'language/switch/$1';
// ==========================================================


// ==========================================================================
$route["404_override"] = "ErrorController"; // ORIGINAL


// Frontend error pages (dilli və dilsiz variantlar)
$route['error_404'] = 'UserController/error_404';
$route['(az|en)/error_404'] = 'UserController/error_404/$1';


// CodeIgniter 404 override → ErrorController
$route['404_override'] = 'ErrorController/index';
// ==========================================================================

$route["translate_uri_dashes"] = FALSE;

/*<================> Language Routes <================>*/
$route["locale/(:any)"]["GET"] = "user/LanguageController/index/$1";
$route["admin/locale/(:any)"]["GET"] = "admin/LanguageController/index/$1";

/*<================> User Routes <================>*/
/*<========> Home Routes <========>*/
$route[""]["GET"] = "user/HomeController/index";
$route["home"]["GET"] = "user/HomeController/home";

/*<========> News Routes <========>*/
$route["news"]["GET"] = "user/NewsController/index";
$route["news/(:any)"]["GET"] = "user/NewsController/show/$1";

/*<========> Categories Routes <========>*/
$route["categories"]["GET"] = "user/CategoriesController/index";
$route["categories/(:any)"]["GET"] = "user/CategoriesController/show/$1";

/*<========> About Routes <========>*/
// $route["about"]["GET"] = "user/AboutController/index";

/*<========> Contacts Routes <========>*/
$route["contacts"]["GET"] = "user/ContactsController/index";

/*<========> Team Routes <========>*/
$route["team"]["GET"] = "user/TeamController/index";

/*<========> Team Routes <========>*/
$route["author/(:any)"]["GET"] = "user/AuthorController/show/$1";

/*<========> Auth Routes <========>*/
$route["login"]["GET"] = "user/AuthController/index";
$route["register"]["GET"] = "user/AuthController/register";

/*<================> Admin Routes <================>*/
/*<========> Auth Routes <========>*/
$route["admin/login"]["GET"] = "admin/AuthController/index";
$route["admin/login/verify"]["POST"] = "admin/AuthController/verify";
$route["admin/logout"]["GET"] = "admin/AuthController/logout";

/*<========> Dashboard Routes <========>*/
$route["admin/dashboard"]["GET"] = "admin/DashboardController/index";

/*<========> Profiles Routes <========>*/
$route["admin/profiles"]["GET"] = "admin/ProfilesController/index";
$route["admin/profiles/create"]["GET"] = "admin/ProfilesController/create";
$route["admin/profiles/store"]["POST"] = "admin/ProfilesController/store";
$route["admin/profiles/json"]["POST"] = "admin/ProfilesController/json";
$route["admin/profiles/(:any)"]["GET"] = "admin/ProfilesController/show/$1";
$route["admin/profiles/(:any)/edit"]["GET"] = "admin/ProfilesController/edit/$1";
$route["admin/profiles/(:any)/update"]["POST"] = "admin/ProfilesController/update/$1";
$route["admin/profiles/(:any)/delete"]["GET"] = "admin/ProfilesController/destroy/$1";
$route["admin/profiles/(:any)/status"]["POST"] = "admin/ProfilesController/status/$1";

/*<========> Categories Routes <========>*/
$route["admin/categories"]["GET"] = "admin/CategoriesController/index";
$route["admin/categories/create"]["GET"] = "admin/CategoriesController/create";
$route["admin/categories/store"]["POST"] = "admin/CategoriesController/store";
$route["admin/categories/json"]["POST"] = "admin/CategoriesController/json";
$route["admin/categories/(:any)"]["GET"] = "admin/CategoriesController/show/$1";
$route["admin/categories/(:any)/edit"]["GET"] = "admin/CategoriesController/edit/$1";
$route["admin/categories/(:any)/update"]["POST"] = "admin/CategoriesController/update/$1";
$route["admin/categories/(:any)/status"]["POST"] = "admin/CategoriesController/status/$1";
$route["admin/categories/(:any)/delete"]["GET"] = "admin/CategoriesController/destroy/$1";
$route["admin/categories/(:any)/status"]["POST"] = "admin/CategoriesController/status/$1";

/*<========> News Routes <========>*/
$route["admin/news"]["GET"] = "admin/NewsController/index";
$route["admin/news/create"]["GET"] = "admin/NewsController/create";
$route["admin/news/store"]["POST"] = "admin/NewsController/store";
$route["admin/news/json"]["POST"] = "admin/NewsController/json";
$route["admin/news/(:any)"]["GET"] = "admin/NewsController/show/$1";
$route["admin/news/(:any)/edit"]["GET"] = "admin/NewsController/edit/$1";
$route["admin/news/(:any)/update"]["POST"] = "admin/NewsController/update/$1";
$route["admin/news/(:any)/status"]["POST"] = "admin/NewsController/status/$1";
$route["admin/news/(:any)/delete"]["GET"] = "admin/NewsController/destroy/$1";
$route["admin/news/(:any)/status"]["POST"] = "admin/NewsController/status/$1";

/*<========> Advertising Routes <========>*/
$route["admin/advertising"]["GET"] = "admin/AdvertisingController/index";
$route["admin/advertising/create"]["GET"] = "admin/AdvertisingController/create";
$route["admin/advertising/store"]["POST"] = "admin/AdvertisingController/store";
$route["admin/advertising/json"]["POST"] = "admin/AdvertisingController/json";
$route["admin/advertising/(:any)"]["GET"] = "admin/AdvertisingController/show/$1";
$route["admin/advertising/(:any)/edit"]["GET"] = "admin/AdvertisingController/edit/$1";
$route["admin/advertising/(:any)/update"]["POST"] = "admin/AdvertisingController/update/$1";
$route["admin/advertising/(:any)/status"]["POST"] = "admin/AdvertisingController/status/$1";
$route["admin/advertising/(:any)/delete"]["GET"] = "admin/AdvertisingController/destroy/$1";
$route["admin/advertising/(:any)/status"]["POST"] = "admin/AdvertisingController/status/$1";

/*<========> Settings Routes <========>*/
$route["admin/settings"]["GET"] = "admin/SettingsController/index";
$route["admin/settings/update"]["POST"] = "admin/SettingsController/update";
