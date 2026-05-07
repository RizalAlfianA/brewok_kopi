<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
|--------------------------------------------------------------------------
| WEBSITE
|--------------------------------------------------------------------------
*/

$routes->get('/', 'Website\Home::index');
$routes->get('menu', 'Website\Menu::index');
$routes->get('tentang', 'Website\Tentang::index');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

$routes->get('login', 'Auth\Login::index');
$routes->post('login/process', 'Auth\Login::process');
$routes->get('logout', 'Auth\Login::logout');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

$routes->group('admin', ['filter' => 'role:admin,owner'], function($routes){

    // dashboard
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    /*
    |--------------------------------------------------------------------------
    | KATEGORI
    |--------------------------------------------------------------------------
    */

    $routes->get('kategori', 'Admin\Kategori::index');
    $routes->get('kategori/create', 'Admin\Kategori::create');
    $routes->post('kategori/store', 'Admin\Kategori::store');
    $routes->get('kategori/edit/(:num)', 'Admin\Kategori::edit/$1');
    $routes->post('kategori/update/(:num)', 'Admin\Kategori::update/$1');
    $routes->get('kategori/delete/(:num)', 'Admin\Kategori::delete/$1');

    /*
    |--------------------------------------------------------------------------
    | MENU
    |--------------------------------------------------------------------------
    */

    $routes->get('menu', 'Admin\Menu::index');
    $routes->get('menu/create', 'Admin\Menu::create');
    $routes->post('menu/store', 'Admin\Menu::store');
    $routes->get('menu/edit/(:num)', 'Admin\Menu::edit/$1');
    $routes->post('menu/update/(:num)', 'Admin\Menu::update/$1');
    $routes->get('menu/delete/(:num)', 'Admin\Menu::delete/$1');

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    $routes->get('laporan', 'Admin\Laporan::index');

});

/*
|--------------------------------------------------------------------------
| OWNER PANEL
|--------------------------------------------------------------------------
*/

$routes->group('owner', ['filter' => 'role:owner'], function($routes){

    $routes->get('dashboard', 'Owner\Dashboard::index');

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    $routes->get('laporan', 'Owner\Laporan::index');

    $routes->get('laporan/exportPdf', 'Owner\Laporan::exportPdf');
    $routes->get('laporan/exportExcel', 'Owner\Laporan::exportExcel');

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    $routes->get('user', 'Owner\User::index');
    $routes->get('user/create', 'Owner\User::create');
    $routes->post('user/store', 'Owner\User::store');
    $routes->get('user/edit/(:num)', 'Owner\User::edit/$1');
    $routes->post('user/update/(:num)', 'Owner\User::update/$1');
    $routes->get('user/delete/(:num)', 'Owner\User::delete/$1');

});

/*
|--------------------------------------------------------------------------
| KASIR POS
|--------------------------------------------------------------------------
*/

$routes->group('kasir', ['filter' => 'role:kasir'], function($routes){

    $routes->get('pos', 'Kasir\Pos::index');
    $routes->post('simpan-transaksi', 'Kasir\Pos::simpan');

});