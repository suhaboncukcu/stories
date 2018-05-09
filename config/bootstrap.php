<?php 
use Cake\Core\Configure;
use Cake\Database\Type;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Stories\Middleware\LoggerMiddleware;

Type::map('json', 'Cake\Database\Type\JsonType');

Log::setConfig('story', [
    'className' => 'Stories.Database',
    'model' => 'Stories.Stories',
    'scopes' => ['registered_user'],
]);


EventManager::instance()->on(
	'Server.buildMiddleware',
	function ($event, $middleware) {
    	$middleware->add(new LoggerMiddleware());
	});


Configure::load('Stories.stories');
collection((array)Configure::read('Stories.config'))->each(function ($file) {
    Configure::load($file);
});
