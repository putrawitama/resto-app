<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/menu'] = 'admin/getMenu';
$route['admin/menu/add'] = 'admin/getAddMenu';
$route['admin/menu/save']['post'] = 'admin/postAddMenu';
$route['admin/menu/edit/(:num)'] = 'admin/getEditMenu/$1';
$route['admin/menu/update/(:num)']['post'] = 'admin/postEditMenu/$1';
$route['admin/menu/detail/(:num)'] = 'admin/getDetailMenu/$1';
$route['admin/menu/delete/(:num)'] = 'admin/getDeleteMenu/$1';

$route['admin/meja'] = 'admin/getMeja';
$route['admin/meja/add'] = 'admin/getAddMeja';
$route['admin/meja/store']['post'] = 'admin/postAddMeja';
$route['admin/meja/edit/(:num)'] = 'admin/getEditMeja/$1';
$route['admin/meja/update/(:num)']['post'] = 'admin/postEditMeja/$1';
$route['admin/meja/delete/(:num)'] = 'admin/getDeleteMeja/$1';
$route['admin/meja/qr/(:num)'] = 'admin/getPrintMeja/$1';

$route['admin/user'] = 'auth/getUser';
$route['user/changeStatus/(:num)'] = 'auth/changeStatus/$1';

$route['login'] = 'auth/loginForm';
$route['postLogin']['post'] = 'auth/postLogin';
$route['register'] = 'auth/registerForm';
$route['postRegiter']['post'] = 'auth/postRegister';
$route['logout'] = 'auth/logout';

$route['change-password'] = 'auth/getChangePassword';
$route['postChange/(:num)']['post'] = 'auth/postChangePassword/$1';

$route['transaksi'] = 'transaksi/getTransaksi';
$route['transaksi/now'] = 'transaksi/getTransaksiNow';
$route['transaksi/detail/(:num)'] = 'transaksi/getDetail/$1';
$route['transaksi/selesai/(:num)'] = 'transaksi/getSelesai/$1';

$route['current'] = 'transaksi/getCurrent';
$route['change-status']['post'] = 'transaksi/postChange';
$route['current-api'] = 'transaksi/getCurrentApi';

$route['checkTable']['post'] = 'welcome/checkIn';
$route['menu'] = 'welcome/getMenu';
$route['addCart']['post'] = 'welcome/postAddCart';
$route['cart'] = 'welcome/load_cart';
$route['delCart']['post'] = 'welcome/hapus_cart';
$route['order'] = 'welcome/order';
$route['selesai'] = 'welcome/getSelesai';

$route['print/(:num)'] = 'welcome/printPDF/$1';