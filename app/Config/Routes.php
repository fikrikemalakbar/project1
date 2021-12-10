<?php
namespace Config;
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

//front
$routes->get('/', 'Home::index');

//route gallery dashboard
$routes->get('/dashboardgallery', 'DashboardGallery::index');
$routes->get('/dashboardgallery/create', 'DashboardGallery::create');
$routes->get('/dashboardgallery/edit/(:segment)', 'DashboardGallery::edit/$1');
$routes->delete('/dashboardgallery/(:num)', 'DashboardGallery::delete/$1');
$routes->get('/dashboardgallery/(:any)', 'DashboardGallery::detail/$1');

//route feature dasboard
$routes->get('/dashboardfeature', 'DashboardFeature::index');
$routes->get('/dashboardfeature/create', 'DashboardFeature::create');
$routes->get('/dashboardfeature/edit/(:segment)', 'DashboardFeature::edit/$1');
$routes->delete('/dashboardfeature/(:num)', 'DashboardFeature::delete/$1');
$routes->get('/dashboardfeature/(:any)', 'DashboardFeature::detail/$1');

//type a
$routes->get('/dashboardtypea', 'Dashboardtypea::index');
$routes->get('/dashboardtypea/create', 'Dashboardtypea::create');
$routes->get('/dashboardtypea/edit/(:segment)', 'Dashboardtypea::edit/$1');
$routes->delete('/dashboardtypea/(:num)', 'Dashboardtypea::delete/$1');
$routes->get('/dashboardtypea/(:any)', 'Dashboardtypea::detail/$1');

//type b
$routes->get('/dashboardtypeb', 'Dashboardtypeb::index');
$routes->get('/dashboardtypeb/create', 'Dashboardtypeb::create');
$routes->get('/dashboardtypeb/edit/(:segment)', 'Dashboardtypeb::edit/$1');
$routes->delete('/dashboardtypeb/(:num)', 'Dashboardtypeb::delete/$1');
$routes->get('/dashboardtypeb/(:any)', 'Dashboardtypeb::detail/$1');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
