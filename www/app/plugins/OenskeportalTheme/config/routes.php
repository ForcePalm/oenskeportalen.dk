<?php
use Cake\Routing\Route\DashedRoute;

$routes->plugin(
    'OenskeportalTheme',
    ['path' => '/'],
    function ($routes) {
        $routes->setRouteClass(DashedRoute::class);

        /*$routes->get('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $routes->get('/faq', ['controller' => 'Faq', 'action' => 'index']);
        $routes->get('/about', ['controller' => 'AboutUs', 'action' => 'index']);*/
    }
);
