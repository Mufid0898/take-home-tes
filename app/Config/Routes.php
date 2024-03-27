<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Produk/Edit/(:num)', 'Produk::edit/$1');
$routes->setAutoRoute(true);
