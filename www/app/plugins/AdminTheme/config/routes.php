<?php
use Cake\Routing\Route\DashedRoute;

$routes->plugin(
    'AdminTheme',
    ['path' => '/admin'],
    function ($routes) {
        $routes->setRouteClass(DashedRoute::class);

        $routes->get('/', ['controller' => 'Dashboard']);
    }
);