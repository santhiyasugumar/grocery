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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->post('/getLoginDetails', 'Login::getLoginDetails');

$routes->post('/category/getAllData', 'Category::getAllData');
$routes->post('/category/save', 'Category::save');
$routes->post('/category/update', 'Category::update');

$routes->post('/subcategory/getAllData', 'Subcategory::getAllData');
$routes->post('/subcategory/save', 'Subcategory::save');
$routes->post('/subcategory/update', 'Subcategory::update');
$routes->post('/subcategory/getSubCategoryById', 'Subcategory::getSubCategoryById');


$routes->get('/product/getData_drp', 'Product::getData_drp');
$routes->post('/product/getAllData', 'Product::getAllData');
$routes->post('/product/save', 'Product::save');

$routes->get('/menu/getAllMenu', 'Menu::megaMenu');
$routes->get('/plp/sc/(:any)', 'Plp::index');
$routes->post('/getProductBasedonCategoryId', 'Plp::getProductBasedonCategoryId');



// $routes->get('/demo/action3/(:any)', 'Demo::index3/$1');

$routes->resource('amirthamcinema');
$routes->resource('login');
$routes->resource('news');
$routes->resource('category');
$routes->resource('order');
$routes->resource('product');
$routes->resource('home');
$routes->resource('subcategory');
$routes->resource('plp');
$routes->resource('menu');



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
