<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*
 * --------------------------------------------------------------------
 * ############# WEB #############
 * --------------------------------------------------------------------
 */
$routes->get('/', 'pmi\Authentication\Login::index');

$routes->group('dds', function ($routes) {
    $routes->get('registrasi', 'pmi\DDS\Registrasi::index');
    $routes->post('create', 'pmi\DDS\Registrasi::create');    
});

$routes->group('authentication', function ($routes) {
    $routes->get('/', 'pmi\Authentication\Login::index');
    $routes->group('login', function ($routes) {
        $routes->get('/', 'pmi\Authentication\Login::index');
        $routes->post('do', 'pmi\Authentication\Login::do_login');        
    });
    // $routes->get('register', 'Authentication\Register::index');      
    // $routes->get('verify', 'Authentication\Register::verify');      
    // $routes->get('forget_password', 'Authentication\Forget_password::index');
    $routes->get('logout', 'pmi\Authentication\Login::logout');
});



/*
 * --------------------------------------------------------------------
 * ############# COMPANY #############
 * --------------------------------------------------------------------
 */
$routes->group('company', ['filter' => 'authentication'], function ($routes) {
    $routes->get('/', 'pmi\Company\Dashboard::index');

    // dashbaord
    $routes->group('dashboard', function ($routes) {
        $routes->get('/', 'pmi\Company\Dashboard::index');
    });

    // MASTER DATA
    // pasien
    $routes->group('pasien', function ($routes) {
        $routes->get('/', 'pmi\Company\Pasien::index');
        $routes->get('show/(:num)', 'pmi\Company\Pasien::show/$1');
        $routes->post('create', 'pmi\Company\Pasien::create');
        $routes->get('edit/(:num)', 'pmi\Company\Pasien::edit/$1');
        $routes->post('update/(:num)', 'pmi\Company\Pasien::update/$1');
        $routes->delete('delete/(:num)', 'pmi\Company\Pasien::delete/$1');
        $routes->delete('delete_in/(:any)', 'pmi\Company\Pasien::delete_in/$1');
        $routes->get('getMax', 'pmi\Company\Pasien::getMax');
    });

    
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
