<?php
use Cake\Routing\Router;

Router::plugin(
    'Stories',
    ['path' => '/stories'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
