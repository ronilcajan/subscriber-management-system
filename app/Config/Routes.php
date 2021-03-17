<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function(){
	return view('errors/404');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('admin', 'Home::index');
$routes->add('success-login', 'Home::home');


$routes->group('admin', function($routes) {
	$routes->add('profile', 'Profile::index');

	$routes->post('user_update', 'Admin\Users::update');
	$routes->add('user_info/(:num)', 'Admin\Users::user_info/$1');

	$routes->add('new_subscriber', 'Admin\Subscribers::new_subs');
	$routes->post('add_subs', 'Admin\Subscribers::create');
	$routes->post('update_profile', 'Profile::update');
	$routes->post('change_password', 'Profile::changepass');

	$routes->add('subscriber/delete/(:num)', 'Admin\Subscribers::delete/$1');
	$routes->add('subscriber/update/(:num)', 'Admin\Subscribers::edit/$1');
	$routes->post('update_subs', 'Admin\Subscribers::update');
	$routes->post('changeSubsStatus', 'Admin\Subscribers::changeStatus');
	$routes->add('subscriber_info/(:num)', 'Admin\Subscribers::profile/$1');

	$routes->add('new_account', 'Admin\Accounts::new_account');
	$routes->post('add_account', 'Admin\Accounts::create');
	$routes->add('update_account/(:num)', 'Admin\Accounts::edit_account/$1');
	$routes->add('account/delete/(:num)', 'Admin\Accounts::delete/$1');
	$routes->post('changeAccStatus', 'Admin\Accounts::changeStatus');
	$routes->post('account_update', 'Admin\Accounts::update');
	$routes->add('account_info/(:num)', 'Admin\Accounts::account_info/$1');

	$routes->post('getPayment', 'Admin\Payments::getPayment');
	$routes->post('paynow', 'Admin\Payments::paynow');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
