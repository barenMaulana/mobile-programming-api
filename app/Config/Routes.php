<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/registrasi', 'RegistrasiController::registrasi');
$routes->post('/login', 'LoginController::login');
$routes->group('produk', function ($routes){
    $routes->post('/','ProdukController::create');
    $routes->get('/', 'produkcontroller::list');
    $routes->get('(:segment)', 'ProdukController::detail/$1');
    $routes->put('(:segment)','ProdukController::ubah/$1');
    $routes->delete ('(:segment)', 'ProdukController::hapus/$1');
});

$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/dashboard/create', 'DashboardController::create');
$routes->post('/dashboard/store', 'DashboardController::store');
$routes->get('/dashboard/edit/(:num)', 'DashboardController::edit/$1');
$routes->post('/dashboard/update/(:num)', 'DashboardController::update/$1');
$routes->get('/dashboard/delete/(:num)', 'DashboardController::delete/$1');
