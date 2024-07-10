<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('Attachment');
$routes->resource('Kategori');
$routes->resource('Reminder');
$routes->resource('Task');
$routes->resource('User');
