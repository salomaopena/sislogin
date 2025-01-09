<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login-form','Home::login');
$routes->post('login-submit','Home::login_submit');
$routes->get('dashboard','Home::dashboard');
$routes->get('logout','Home::logout');
