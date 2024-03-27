<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('login', 'Home::showSignInForm');
$routes->get('register', 'Home::showSignUpForm');

$routes->get('logout', 'Auth::logOut');
$routes->post('register', 'Auth::register');
$routes->post('login', 'Auth::login');