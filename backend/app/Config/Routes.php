<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
// $routes->get('/headers', 'Users::headers');
// $routes->get('/textchange', 'Users::textchange');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/login', 'Users::login');
$routes->get('/signup', 'Users::signup');
$routes->get('/dashboard', 'Users::dashboard');
$routes->get('/admin-dashboard', 'Admin::index');
$routes->get('/admin-gameManager', 'Admin::gameManager');
$routes->get('/admin-userManage', 'Admin::userManager');
$routes->get('/moodboard', 'Users::moodboard');
