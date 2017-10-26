<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'beranda';

$route['404_override'] = 'beranda/not_found_404';

$route['translate_uri_dashes'] = FALSE;
	
$route['struktur-organisasi'] = 'organisasi';

$route['kontak'] = 'beranda/kontak';

$route['syarat-dan-ketentuan'] = 'syarat';

$route['profil'] = 'tentang';

$route['profil/get/(:any)']    =   "tentang/get/$1";

$route['kelurahan-desa'] = 'kelurahan_desa';

$route['data-pembangunan'] = 'data_pembangunan';

$route['kelurahan-desa/get/(:any)']    =   "kelurahan_desa/get/$1/";

$route['administrator'] = 'administrator/login';

$route['administrator/kelurahan-desa'] = 'administrator/kelurahan';

$route['administrator/kelurahan-desa/create'] = 'administrator/kelurahan/create';

$route['administrator/kelurahan-desa/get/(:any)'] = 'administrator/kelurahan/get/$1';

$route['administrator/kelurahan-desa/status/(:any)'] = 'administrator/kelurahan/status/$1';

$route['organisasi-kemasyarakatan'] = 'organisasi_kemasyarakatan';

$route['organisasi-kemasyarakatan/get/(:any)']    =   "organisasi_kemasyarakatan/get/$1";
