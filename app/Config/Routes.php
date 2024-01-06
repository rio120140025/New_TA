<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->add('Dashboard/(:num)', 'Dashboard::index/$1');
$routes->add('datatipemotor/(:num)', 'DataTipeMotor::index/$1');
$routes->add('dataprovinsi/(:num)', 'DataProvinsi::index/$1');
$routes->add('datakabupatenkota/(:num)', 'DataKabupatenKota::index/$1');
$routes->add('datakecamatan/(:num)', 'DataKecamatan::index/$1');
$routes->add('datakelurahandesa/(:num)', 'DataKelurahanDesa::index/$1');
$routes->get('sukses/(:any)', 'Sukses::index/$1');
$routes->get('updatelaporan/(:any)', 'UpdateLaporan::index/$1');
$routes->get('updatelaporantkp/(:any)', 'UpdateLaporanTKP::index/$1');
$routes->get('detaillaporan/(:any)', 'DetailLaporan::index/$1');

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
