<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/rekomendasi', 'Rekomendasi::index');
$routes->post('/rekomendasi', 'Rekomendasi::index');
$routes->get('/rekomendasi/detail_wisata/(:any)', 'Rekomendasi::detailWisata/$1');
$routes->post('/rekomendasi/detail_wisata/reviewWisata', 'Rekomendasi::saveReview');

$routes->get('/tentang_kami', 'TentangKami::index');
$routes->get('/beri_review_pada_DolanKuy', 'Saran::index');
$routes->post('/beri_review_pada_DolanKuy/saveProcess', 'Saran::SaveSaran');

$routes->get('/login', 'Auth::index');
$routes->post('/login/auth_process', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/register_process', 'Auth::registerProcess');

// google login
$routes->get('/login/process', 'Auth::process');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/main_data/destinasi_wisata', 'DestinasiWisata::index');
$routes->get('/main_data/destinasi_wisata/add', 'DestinasiWisata::addDestinasi');
$routes->post('/main_data/destinasi_wisata/add/process', 'DestinasiWisata::addProcess');
$routes->get('/main_data/destinasi_wisata/edit/(:any)', 'DestinasiWisata::editDestinasi/$1');
$routes->post('/main_data/destinasi_wisata/edit/process/(:any)', 'DestinasiWisata::editProcess/$1');
$routes->delete('/main_data/destinasi_wisata/delete/(:any)', 'DestinasiWisata::deleteDestinasi/$1');

$routes->get('/main_data/kategori_wisata', 'KategoriWisata::index');
$routes->post('/main_data/kategori_wisata/add/process', 'KategoriWisata::addProcess');
$routes->post('/main_data/kategori_wisata/edit/process/(:num)', 'KategoriWisata::editProcess/$1');
$routes->delete('/main_data/kategori_wisata/delete/(:num)', 'KategoriWisata::deleteProcess/$1');

$routes->get('/main_data/fasilitas_wisata', 'FasilitasWisata::index');
$routes->post('/main_data/fasilitas_wisata/add/process', 'FasilitasWisata::addProcess');
$routes->post('/main_data/fasilitas_wisata/edit/process/(:num)', 'FasilitasWisata::editProcess/$1');
$routes->delete('/main_data/fasilitas_wisata/delete/(:num)', 'FasilitasWisata::deleteProcess/$1');

$routes->get('/main_data/kecamatan', 'Kecamatan::index');
$routes->post('/main_data/kecamatan/add/process', 'Kecamatan::addProcess');
$routes->post('/main_data/kecamatan/edit/process/(:num)', 'Kecamatan::editProcess/$1');
$routes->delete('/main_data/kecamatan/delete/(:num)', 'Kecamatan::deleteProcess/$1');

$routes->get('/main_data/users', 'Auth::AllUsers');
$routes->delete('/main_data/users/delete/(:any)', 'Auth::deleteUsers/$1');

$routes->post('/update-status-review/(:num)', 'Rekomendasi::updateStatusReview/$1');

$routes->get('/riwayat_rekomendasi', 'Simmilarity::index');
$routes->get('/riwayat_rekomendasi/detail/(:any)', 'Simmilarity::detailHistory/$1');
$routes->get('/riwayat_rekomendasi_unknown_user', 'Simmilarity::unknownUser');
$routes->get('/riwayat_rekomendasi_unknown_user/detail/(:any)', 'Simmilarity::detailHistoryUnknownUser/$1');
$routes->delete('/riwayat_rekomendasi/delete/(:any)', 'Simmilarity::deleteHistory/$1');

$routes->get('/setting_website', 'SettingWebsite::index');
$routes->post('/setting_website/update/logo/(:num)', 'SettingWebsite::updateLogo/$1');
$routes->post('/setting_website/update/desc/(:num)', 'SettingWebsite::updateDesc/$1');