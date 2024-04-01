<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes for client side
$routes->get('/', 'Home::showMainPage', ['filter' => 'auth']);
$routes->get('login', 'Home::showSignInForm');
$routes->get('register', 'Home::showSignUpForm');
$routes->get('user/(:any)', 'Home::showProfile/$1', ['filter' => 'auth']);
$routes->group('post', ['filter' => 'auth'], static function ($routes) {
    $routes->get('create', 'Home::showPostCreateForm');
    $routes->get('edit', 'Home::showPostEditForm');
});
$routes->get('accounts', 'Home::showAccounts', ['filter' => ['auth', 'admin']]);

// Routes for server side
$routes->get('logout', 'Auth::logOut');
$routes->post('register', 'Auth::register');
$routes->post('login', 'Auth::login');
$routes->group('post', ['filter' => 'auth'], static function ($routes) {
    $routes->put('create', 'Post::create');
    $routes->post('edit/(:num)', 'Post::edit/$1');
    $routes->delete('delete/(:num)', 'Post::delete/$1');
});