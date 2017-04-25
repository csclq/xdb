<?php

use Phalcon\Loader;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;


/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset
    ];

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }

    $connection = new $class($params);

    return $connection;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Configure the Volt service for rendering .volt templates
 */
$di->setShared('voltShared', function ($view) {
    $config = $this->getConfig();

    $volt = new VoltEngine($view, $this);
    $volt->setOptions([
        'compiledPath' => function($templatePath) use ($config) {

            // Makes the view path into a portable fragment
            $templateFrag = str_replace($config->application->appDir, '', $templatePath);

            // Replace '/' with a safe '%%'
            $templateFrag = basename(str_replace('/', '_', $templateFrag));

            return $config->application->cacheDir  . $templateFrag . '.php';
        }
    ]);

    return $volt;
});



$di->setShared('weixin', function () {
    $config = $this->getConfig();
    return new \EasyWeChat\Foundation\Application(json_decode(json_encode($config->wechat),true));
});


$di->setShared('xlsx', function () {
    return \Box\Spout\Writer\WriterFactory::create(\Box\Spout\Common\Type::XLSX);
});

$di->setShared('common',function (){
   return new \App\Library\Common();
});

$di->setShared('redis', function () {
    try{
        $config = $this->getConfig();
        $redis= new redis();
        $redis->connect($config->redis->host,$config->redis->port);
        $redis->auth($config->redis->password);
        return $redis;
    }catch (Exception $e){
        exit($e->getMessage());
    }

});