<?php 
use Cake\Log\Log;
use Cake\Event\EventManager;
use Stories\Middleware\LoggerMiddleware;



Log::config('story', [
    'className' => 'Stories.Database',
    'model' => 'Stories',
    'scopes' => ['registered_user'],
]);



EventManager::instance()->on(
	'Server.buildMiddleware',
	function ($event, $middleware) {
    	$middleware->add(new LoggerMiddleware());
	});
