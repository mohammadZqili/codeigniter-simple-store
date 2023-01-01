<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Admin\AdminAuthController;

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
helper('auth');
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {
    $adminReservedRoutes = config(AdminAuth::class)->reservedRoutes;
    $routePrefix = "admin.";

    $routes->get($adminReservedRoutes['login'], 'AdminAuthController::login', ['as' => $routePrefix . $adminReservedRoutes['login']]);
    $routes->post($adminReservedRoutes['login'], 'AdminAuthController::attemptLogin');
    $routes->get($adminReservedRoutes['logout'], 'AdminAuthController::logout');

    // Registration
    $routes->get($adminReservedRoutes['register'], 'AdminAuthController::register', ['as' => $routePrefix . $adminReservedRoutes['register']]);
    $routes->post($adminReservedRoutes['register'], 'AdminAuthController::attemptRegister');

    // Activation
    $routes->get($adminReservedRoutes['activate-account'], 'AdminAuthController::activateAccount', ['as' => $routePrefix . $adminReservedRoutes['activate-account']]);
    $routes->get($adminReservedRoutes['resend-activate-account'], 'AdminAuthController::resendActivateAccount', ['as' => $routePrefix . $adminReservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($adminReservedRoutes['forgot'], 'AdminAuthController::forgotPassword', ['as' => $routePrefix . $adminReservedRoutes['forgot']]);
    $routes->post($adminReservedRoutes['forgot'], 'AdminAuthController::attemptForgot');
    $routes->get($adminReservedRoutes['reset-password'], 'AdminAuthController::resetPassword', ['as' => $routePrefix . $adminReservedRoutes['reset-password']]);
    $routes->post($adminReservedRoutes['reset-password'], 'AdminAuthController::attemptReset');
});


$routes->group('', ['namespace' => 'App\Controllers\Customer'], static function ($routes) {
    $customerReservedRoutes = config(CustomerAuth::class)->reservedRoutes;
    $routePrefix = "";

    $routes->get($customerReservedRoutes['login'], 'CustomerAuthController::login', ['as' => $routePrefix . $customerReservedRoutes['login']]);
    $routes->post($customerReservedRoutes['login'], 'CustomerAuthController::attemptLogin');
    $routes->get($customerReservedRoutes['logout'], 'CustomerAuthController::logout');

    // Registration
    $routes->get($customerReservedRoutes['register'], 'CustomerAuthController::register', ['as' => $routePrefix . $customerReservedRoutes['register']]);
    $routes->post($customerReservedRoutes['register'], 'CustomerAuthController::attemptRegister');

    // Activation
    $routes->get($customerReservedRoutes['activate-account'], 'CustomerAuthController::activateAccount', ['as' => $routePrefix . $customerReservedRoutes['activate-account']]);
    $routes->get($customerReservedRoutes['resend-activate-account'], 'CustomerAuthController::resendActivateAccount', ['as' => $routePrefix . $customerReservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($customerReservedRoutes['forgot'], 'CustomerAuthController::forgotPassword', ['as' => $routePrefix . $customerReservedRoutes['forgot']]);
    $routes->post($customerReservedRoutes['forgot'], 'CustomerAuthController::attemptForgot');
    $routes->get($customerReservedRoutes['reset-password'], 'CustomerAuthController::resetPassword', ['as' => $routePrefix . $customerReservedRoutes['reset-password']]);
    $routes->post($customerReservedRoutes['reset-password'], 'CustomerAuthController::attemptReset');
});


if (logged_in()) {

    $routes->group('brands', static function ($routes) {
        $routes->get('/', 'BrandController::index');
        if (in_groups(["admin", "super-admin"])) {
            $routes->get('create', 'BrandController::create');
            $routes->post('/', 'BrandController::store');
            $routes->get('edit/(:num)', 'BrandController::single/$1');
            $routes->post('update', 'BrandController::update');
            $routes->get('delete/(:num)', 'BrandController::delete/$1');
        }


    });


    $routes->group('categories', static function ($routes) {
        $routes->get('/', 'CategoryController::index');
        if (in_groups(["admin", "super-admin"])) {
            $routes->get('create', 'CategoryController::create');
            $routes->post('/', 'CategoryController::store');

            $routes->get('edit/(:num)', 'CategoryController::single/$1');
            $routes->post('update', 'CategoryController::update');

            $routes->get('delete/(:num)', 'CategoryController::delete/$1');
        }
    });

    $routes->group('products', static function ($routes) {
        $routes->get('/', 'ProductController::index');
        if (in_groups(["admin", "super-admin"])) {
            $routes->get('create', 'ProductController::create');
            $routes->post('/', 'ProductController::store');

            $routes->get('edit/(:num)', 'ProductController::single/$1');
            $routes->post('update', 'ProductController::update');

            $routes->get('delete/(:num)', 'ProductController::delete/$1');
        }
    });


    $routes->group('wish', static function ($routes) {
        if (in_groups(["customer"])) {
            $routes->get('/', 'WishListController::index');
            $routes->post('/', 'WishListController::store');

            $routes->post('update', 'WishListController::update');

            $routes->get('delete/(:num)', 'WishListController::delete/$1');
            $routes->get('empty', 'WishListController::empty');
        }
    });

}

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
