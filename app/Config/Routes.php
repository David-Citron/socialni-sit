<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes for client side
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('login', 'Home::showSignInForm');
$routes->get('register', 'Home::showSignUpForm');
$routes->get('mainPage', 'Home::showContributions');

// Routes for server side
$routes->get('logout', 'Auth::logOut');
$routes->post('register', 'Auth::register');
$routes->post('login', 'Auth::login');