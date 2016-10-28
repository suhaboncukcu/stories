<?php 
use Cake\Core\Configure;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Stories\Middleware\LoggerMiddleware;



Log::config('story', [
    'className' => 'Stories.Database',
    'model' => 'Stories.Stories',
    'scopes' => ['registered_user'],
]);


EventManager::instance()->on(
	'Server.buildMiddleware',
	function ($event, $middleware) {
    	$middleware->add(new LoggerMiddleware());
	});


collection((array)Configure::read('Stories.config'))->each(function ($file) {
    Configure::load($file);
});
