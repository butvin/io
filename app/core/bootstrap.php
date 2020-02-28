<?php

/**
 * Start the application.
 */

use Butvin\Core\Route;

$app = new Route();

/**
 * Custom DB connection state
 */
if ( $conn = \Butvin\Core\DB::getInstance() ) {
    // var_dump(PDO::getAvailableDrivers());
    // session_start();
}

/**
 * Active Record initialization and
 * set primary connection configuration.
 *
 * https://packagist.org/packages/php-activerecord/php-activerecord
 * https://github.com/jpfuentes2/php-activerecord
 */
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory(MODELS_DIR);
    $cfg->set_connections(['development' => MYSQL_CONN_DEV]);
});

/**
 * Start application execution
 */
$app->run();