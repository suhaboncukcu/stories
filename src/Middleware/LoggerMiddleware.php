<?php
namespace Stories\Middleware;

use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\Utility\Hash;


class LoggerMiddleware
{
    /**
     * @param Request $request
     * @param Response $response
     * @param $next
     * @return mixed
     */
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

        // do not log specified plugins
        if(in_array($attributes['params']['plugin'], Configure::read('Stories.DontLog.Plugins'))) {
            return $response;
        }


        //don't log anything if user is not present
        if(!$request->getSession()->read('Auth.User.id')) {
            return $response;
        }

        //prepare the message
        $messageLoad = [
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_id' => @$request->getSession()->read('Auth.User.id'),
            'action' => $attributes['params']['action'],
            'controller' => $attributes['params']['controller'],
            'path' => $path,
            'plugin' => $attributes['params']['plugin'],
            'webroot' => $attributes['webroot'],
        ];

        // log data if it is allowed on Configuration
        if(Configure::read('Stories.DataLogger') === true) {
            $dataLoad = [];
            $dataLoad['pass'] = $attributes['params']['pass'];
            $dataLoad['query'] = $request->getQuery();
            $dataLoad['postData'] = $request->getParsedBody();
            $messageLoad['data_load'] = $dataLoad;
            if(strlen(print_r($dataLoad, TRUE)) > 500) {
                $messageLoad['data_load'] = "Too long to log";
            }

            $dataLoadArr = Hash::merge($dataLoad['postData'], $dataLoad['query'], $dataLoad['pass']);
            if(count(array_intersect(array_keys($dataLoadArr), Configure::read('Stories.DontLog.Fields'))) > 0) {
                return $response;
            }
        }




        $message = json_encode($messageLoad);

        //drop current logs. 
        $debug = Log::getConfig('debug');
        $error = Log::getConfig('error');
        Log::drop('debug');
        Log::drop('error');

        //log to register_user scope
        Log::notice($message,[
            'scope' => ['registered_user']
        ]);

        //reset default logs. 
        Log::setConfig('debug', $debug);
        Log::setConfig('error', $error);

        return $response;
    }
}