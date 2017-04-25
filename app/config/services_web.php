<?php

use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Flash\Direct as Flash;

/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new Router();

    $router->setDefaultModule('frontend');

    return $router;
});

/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Starts the session the first time some component requests the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
* Set the default namespace for dispatcher
*/
$di->setShared('dispatcher', function()  {
    $eventsManager=new \Phalcon\Events\Manager();
    $eventsManager->attach("dispatch:beforeException", function ($event, $dispatcher, $exception)  {
        if($exception->getCode()==5 || $exception->getCode()==2){
            echo "<pre>";
            var_dump($exception);
            exit("404文件不存在");
        }else{
//            $error=new \App\Models\YztError();
//            $error->setContent($exception->getMessage());
//            $error->setNamespace($dispatcher->getNamespaceName());
//            $error->setModule($dispatcher->getModuleName());
//            $error->setController($dispatcher->getControllerName());
//            $error->setAction($dispatcher->getActionName());
//            $error->save();
            echo "<pre>";
            var_dump($exception);
            exit("程序出错:".$exception->getMessage());
        }
    });
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('App\Modules\Frontend\Controllers');
    $dispatcher->setEventsManager($eventsManager);
    return $dispatcher;
});


/**
 * Set common library
 */

$di->setShared('common','App\Library\Common');