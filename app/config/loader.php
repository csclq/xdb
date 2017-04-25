<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'App\Models' => APP_PATH . '/common/models/',
    'App\Library'        => APP_PATH . '/common/library/',
    'App\Modules\Gxc'        => APP_PATH . '/modules/gxc/',
    'App\Modules\Shop'        => APP_PATH . '/modules/shop/',
    'App\Modules\Backend'        => APP_PATH . '/modules/backend/',
    'App\Modules\Crowdfund'        => APP_PATH . '/modules/crowdfund/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'App\Modules\Gxc\Module' => APP_PATH . '/modules/gxc/Module.php',
    'App\Modules\Shop\Module' => APP_PATH . '/modules/Shop/Module.php',
    'App\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'App\Modules\Backend\Module' => APP_PATH . '/modules/backend/Module.php',
    'App\Modules\Crowdfund\Module' => APP_PATH . '/modules/crowdfund/Module.php',
    'App\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
