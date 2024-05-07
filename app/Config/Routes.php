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
    $routes->get('edit/(:num)', 'Home::showPostEditForm/$1');
});

// Routes for administrator
$routes->get('accounts', 'Home::showAccounts', ['filter' => ['auth', 'admin']]);
$routes->get('post', 'Post::showAllPosts', ['filter' => ['auth', 'admin']]);

// Routes for server side
$routes->get('logout', 'Auth::logOut', ['filter' => 'auth']);
$routes->post('register', 'Auth::register');
$routes->post('login', 'Auth::login');
$routes->group('post', ['filter' => 'auth'], static function ($routes) {
    $routes->post('create', 'Post::create');
    $routes->post('edit/(:num)', 'Post::edit/$1');
    $routes->delete('delete/(:num)', 'Post::delete/$1');
});
$routes->group('api', ['filter' => 'auth'], static function ($routes) {
    $routes->post('post', 'Post::apiShowPost');
    $routes->post('post/next', 'Post::apiShowNextPost');
    $routes->post('post/next/(:num)', 'Post::apiShowNextPostMultiple/$1');
    $routes->post('comment/add', 'Post::addComment');
    $routes->post('thumb', 'Post::changeThumb');
});