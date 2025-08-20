<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// home page goes to login
$routes->get('/', 'Auth::login');

// login routes
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::check');
$routes->get('logout', 'Auth::logout');

// Registration routes
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::processRegister');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index');
