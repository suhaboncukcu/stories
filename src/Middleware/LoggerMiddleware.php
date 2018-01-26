<?php
namespace Stories\Middleware;

use Cake\Log\Log;

class LoggerMiddleware
{
    public function __invoke($request, $response, $next)
    {
        // Calling $next() delegates control to the *next* middleware
        // In your application's queue.
        $response = $next($request, $response);

        // Get the URI
		$uri = $request->getUri();

		// Read data out of the URI.
		$path = $uri->getPath();

		$attributes = $request->getAttributes();



		//don't log anything if user is not present
		if(!$request->getSession()->read('Auth.User.id')) {
			return $response;
		}

		//prepare the message
		$message = json_encode([
        	'ip' => $_SERVER['REMOTE_ADDR'],
        	'user_id' => @$request->getSession()->read('Auth.User.id'),
        	'action' => $attributes['params']['action'],
        	'controller' => $attributes['params']['controller'],
        	'path' => $path,
        	'plugin' => $attributes['params']['plugin'],
        	'webroot' => $attributes['webroot'],
        ]);

		//drop current logs. 
		$debug = Log::config('debug');
		$error = Log::config('error');
		Log::drop('debug');
		Log::drop('error');
		
		//log to register_user scope
        Log::notice($message,[
        		'scope' => ['registered_user']
        ]);

        //reset default logs. 
        Log::config('debug', $debug);
        Log::config('error', $error);

        return $response;
    }
}