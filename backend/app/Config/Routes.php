<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/roadmap', 'Users::roadmap');
$routes->post('authenticate', 'Users::authenticate');
$routes->get('/login', 'Users::login');
$routes->post('/login', 'Users::authenticate'); // login POST
$routes->get('/signup', 'Users::signup');
$routes->post('/signup', 'Users::register'); // signup POST
$routes->get('/logout', 'Users::logout'); // logout GET
$routes->get('/admin-dashboard', 'Admin::index');
$routes->get('/admin-gameManager', 'Admin::gameManager');
$routes->get('/admin-userManage', 'Admin::userManager');
$routes->get('/moodboard', 'Users::moodboard');
