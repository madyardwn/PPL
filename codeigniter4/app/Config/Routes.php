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

// Authentification
$routes->get('/', 'Home::index');
$routes->add('hello/(:any)/(:num)', 'C_Home::showme/$1/$2');

// authentication
$routes->get('/login', 'C_Auth::index', ['filter' => 'unauthorized']);
$routes->post('/login', 'C_Auth::login', ['filter' => 'unauthorized']);

// Mahasiswa
$routes->group(
    'mahasiswa',
    function ($routes) {
        $routes->add('/', 'C_Mahasiswa::index', ['filter' => 'auth']);
        $routes->add('info', 'C_Info::index', ['filter' => 'auth']);
        $routes->add('home', 'C_Home::index', ['filter' => 'auth']);
        $routes->add('logout', 'C_Auth::logout', ['filter' => 'auth']);

        $routes->add('search', 'C_Mahasiswa::search', ['filter' => 'auth']);

        $routes->add('store/', 'C_Mahasiswa::store', ['filter' => 'auth']);
        $routes->add('delete/(:num)', 'C_Mahasiswa::delete/$1', ['filter' => 'auth']);
        $routes->add('show/(:num)', 'C_Mahasiswa::show/$1', ['filter' => 'auth']);
        $routes->add('update/(:num)', 'C_Mahasiswa::update/$1', ['filter' => 'auth']);
    }
);


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
    include APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
