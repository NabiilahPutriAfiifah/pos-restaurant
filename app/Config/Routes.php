<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We add a performance increase by specifying the default
// route since we don't have to scan directories.

//Dashboard
$routes->add('/', 'Dashboard::index');
$routes->add('/dashboard', 'Dashboard::index');
$routes->add('/dashboard/(:any)', 'dashboard::$1');

//Login
$routes->add('/login', 'Login::index');
$routes->add('/login/(:any)', 'login::$1');

//Logout
$routes->add('/logout', 'Login::logout');
$routes->add('/logout/(:any)', 'logout::$1');


//Pelanggan
$routes->add('/pelanggan', 'Pelanggan::index');
$routes->add('/pelanggan/(:any)', 'Pelanggan::$1');


// Supplier
$routes->add('/supplier', 'Supplier::index');
$routes->add('/supplier/(:any)', 'Supplier::$1');


// Master
$routes->add('/master/(:any)', 'Master::$1');

// User
$routes->add('/user', 'User::index');
$routes->add('/user/(:any)', 'User::$1');

// Transaksi
$routes->add('/transaksi', 'Transaksi::index');
$routes->add('/transaksi/(:any)', 'Transaksi::$1');

// Penjualan
$routes->add('/penjualan/(:any)', 'Penjualan::$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}