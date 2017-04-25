<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'version' => '1.0',

    'database' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'gxc',
        'password' => 'x_space',
        'dbname' => 'gxc',
        'charset' => 'utf8',
    ],
    'skip_controller'=>'index',

    'application' => [
        'appDir' => APP_PATH . '/',
        'modelsDir' => APP_PATH . '/common/models/',
        'migrationsDir' => APP_PATH . '/migrations/',
        'cacheDir' => BASE_PATH . '/cache/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
//        'baseUri' => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
        'baseUri'   =>  '/'
    ],
    'pageNum'=>10,
    'wechat' => [
        'app_id' => 'wxbcf68516881437e2',
        'secret' => '2c8d5e5d50af9111cacaa157734b2a80',//'c80c15b0c73f7d1af6c56908cb7adbe8',   2c8d5e5d50af9111cacaa157734b2a80
        'token' => 'pou08uog',
//        'aes_key'   =>  'YHhd9wfeFc120rUB5VUTNXkYVdJluUXjvB5L0ejpUKk'
    ],
    'redis' => [
        'host' => '127.0.0.1',
        'port' => 6379,
//        'password'  =>  '',
    ],
    'shareQrcode'=>[
      'background'=>'/img/recommend.jpg'
    ],

    /**
     * if true, then we print a new line at the end of each CLI execution
     *
     * If we dont print a new line,
     * then the next command prompt will be placed directly on the left of the output
     * and it is less readable.
     *
     * You can disable this behaviour if the output of your application needs to don't have a new line at end
     */
    'printNewLine' => true
]);
