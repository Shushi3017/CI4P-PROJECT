<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('roadmap', 'Users::roadmap');

$routes->get('signup', 'Users::signup');      // Signup form
$routes->post('register', 'Users::register'); // Handle signup POST

$routes->get('login', 'Users::login');        // Login form
$routes->post('login', 'Users::authenticate'); // Handle login POST

$routes->get('logout', 'Users::logout');      // Logout action

$routes->get('/admin-dashboard', 'Admin::index');
// Admin Dashboard
$routes->get('/admin', 'Admin::index'); 
$routes->post('/admin/addUser', 'Admin::addUser');
$routes->post('/admin/editUser/(:num)', 'Admin::editUser/$1');
$routes->post('/admin/deleteUser/(:num)', 'Admin::deleteUser/$1'); 
$routes->get('/admin/get-user', 'Admin::getUserById'); 


$routes->get('/admin/games', 'Admin::games');
$routes->post('/admin/addGame', 'Admin::addGame');
$routes->post('/admin/editGame/(:num)', 'Admin::editGame/$1');
$routes->post('/admin/deleteGame/(:num)', 'Admin::deleteGame/$1');
$routes->get('/admin/get-game', 'Admin::getGameById');

$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/profile', 'Users::profile');
$routes->post('profile/update-user', 'Users::updateUser');
$routes->get('/make-board', 'Board::makeBoard');
$routes->post('/boards/save', 'Board::saveBoard');
$routes->get('boards/edit/(:num)', 'Board::editBoard/$1');
$routes->post('boards/update/(:num)', 'Board::updateBoard/$1');
$routes->post('boards/delete/(:num)', 'Board::deleteBoard/$1');
$routes->get('/explore-games', 'Games::explore');
$routes->post('/games/add-to-board', 'Games::addToBoard');
$routes->post('/games/delete/(:num)', 'Games::delete/$1');
