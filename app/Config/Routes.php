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

//type a hero
$routes->get('/dashboardtypeahero', 'Dashboardtypeahero::index');
$routes->get('/dashboardtypeahero/create', 'Dashboardtypeahero::create');
$routes->get('/dashboardtypeahero/edit/(:segment)', 'Dashboardtypeahero::edit/$1');
$routes->delete('/dashboardtypeahero/(:num)', 'Dashboardtypeahero::delete/$1');
$routes->get('/dashboardtypeahero/(:any)', 'Dashboardtypeahero::detail/$1');

//type a child
$routes->get('/dashboardtypeachild', 'Dashboardtypeachild::index');
$routes->get('/dashboardtypeachild/create', 'Dashboardtypeachild::create');
$routes->get('/dashboardtypeachild/edit/(:segment)', 'Dashboardtypeachild::edit/$1');
$routes->delete('/dashboardtypeachild/(:num)', 'Dashboardtypeachild::delete/$1');
$routes->get('/dashboardtypeachild/(:any)', 'Dashboardtypeachild::detail/$1');

//type a text
$routes->get('/dashboardtypeatext', 'Dashboardtypeatext::index');
$routes->get('/dashboardtypeatext/create', 'Dashboardtypeatext::create');
$routes->get('/dashboardtypeatext/edit/(:segment)', 'Dashboardtypeatext::edit/$1');
$routes->delete('/dashboardtypeatext/(:num)', 'Dashboardtypeatext::delete/$1');


//type b hero
$routes->get('/dashboardtypebhero', 'Dashboardtypebhero::index');
$routes->get('/dashboardtypebhero/create', 'Dashboardtypebhero::create');
$routes->get('/dashboardtypebhero/edit/(:segment)', 'Dashboardtypebhero::edit/$1');
$routes->delete('/dashboardtypebhero/(:num)', 'Dashboardtypebhero::delete/$1');
$routes->get('/dashboardtypebhero/(:any)', 'Dashboardtypebhero::detail/$1');

//type B child
$routes->get('/dashboardtypebchild', 'Dashboardtypebchild::index');
$routes->get('/dashboardtypebchild/create', 'Dashboardtypebchild::create');
$routes->get('/dashboardtypebchild/edit/(:segment)', 'Dashboardtypebchild::edit/$1');
$routes->delete('/dashboardtypebchild/(:num)', 'Dashboardtypebchild::delete/$1');
$routes->get('/dashboardtypebchild/(:any)', 'Dashboardtypebchild::detail/$1');

//type B text
$routes->get('/dashboardtypebtext', 'Dashboardtypebtext::index');
$routes->get('/dashboardtypebtext/create', 'Dashboardtypebtext::create');
$routes->get('/dashboardtypebtext/edit/(:segment)', 'Dashboardtypebtext::edit/$1');
$routes->delete('/dashboardtypebtext/(:num)', 'Dashboardtypebtext::delete/$1');

//type Contact Person
$routes->get('/dashboardcontactperson', 'Dashboardcontactperson::index');
$routes->get('/dashboardcontactperson/create', 'Dashboardcontactperson::create');
$routes->get('/dashboardcontactperson/edit/(:segment)', 'Dashboardcontactperson::edit/$1');
$routes->delete('/dashboardcontactperson/(:num)', 'Dashboardcontactperson::delete/$1');


//type background Floor
$routes->get('/dashboardbgfloor', 'Dashboardbgfloor::index');
$routes->get('/dashboardbgfloor/create', 'Dashboardbgfloor::create');
$routes->get('/dashboardbgfloor/edit/(:segment)', 'Dashboardbgfloor::edit/$1');
$routes->delete('/dashboardbgfloor/(:num)', 'Dashboardbgfloor::delete/$1');
$routes->get('/dashboardbgfloor/(:any)', 'Dashboardbgfloor::detail/$1');

//type site plan
$routes->get('/dashboardsiteplan', 'Dashboardsiteplan::index');
$routes->get('/dashboardsiteplan/create', 'Dashboardsiteplan::create');
$routes->get('/dashboardsiteplan/edit/(:segment)', 'Dashboardsiteplan::edit/$1');
$routes->delete('/dashboardsiteplan/(:num)', 'Dashboardsiteplan::delete/$1');

//type marketing
$routes->get('/dashboardmarketing', 'Dashboardmarketing::index');
$routes->get('/dashboardmarketing/create', 'Dashboardmarketing::create');
$routes->get('/dashboardmarketing/edit/(:segment)', 'Dashboardmarketing::edit/$1');
$routes->delete('/dashboardmarketing/(:num)', 'Dashboardmarketing::delete/$1');


//type bank
$routes->get('/dashboardbank', 'Dashboardbank::index');
$routes->get('/dashboardbank/create', 'Dashboardbank::create');
$routes->get('/dashboardbank/edit/(:segment)', 'Dashboardbank::edit/$1');
$routes->delete('/dashboardbank/(:num)', 'Dashboardbank::delete/$1');


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
