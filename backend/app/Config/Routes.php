<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//get 
$routes->get('/', 'Users::index');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/login', 'Users::login');

$routes->get('/signup', 'Users::signup');
$routes->get('/logout', 'Users::logout'); // logout GET
$routes->get('/admin-dashboard', 'Admin::index');
$routes->get('/admin-gameManager', 'Admin::gameManager');
$routes->get('/admin-userManage', 'Admin::userManager');
$routes->get('/moodboard', 'Users::moodboard');


//post
$routes->post('authenticate', 'Users::authenticate');
$routes->post('/login', 'Users::authenticate'); // login POST
$routes->post('/signup', 'Users::register'); // signup POST
$routes->post('/login', 'Admin::index'); // signup POST
