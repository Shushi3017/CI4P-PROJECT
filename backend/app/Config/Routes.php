<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/login', 'Users::login');
$routes->get('/signup', 'Users::signup');