<?php
use Cake\Routing\Router;


$allowTemplates = \Cake\Core\Configure::read('AllowTemplates');
if($allowTemplates) {
    Router::plugin(
        'Stories',
        ['path' => '/stories'],
        function ($routes) {
            $routes->fallbacks('DashedRoute');
        }
    );
}

