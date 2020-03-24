<?php

/**
 * Start the application.
 */
$app = new Butvin\Core\Route();

/**
 * Custom DB class
 */
//if ( \Butvin\Core\DB::getInstance() ) {
if ( \Butvin\Core\DB::getInstance() ) {
    // var_dump(PDO::getAvailableDrivers());
     session_start();
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
    // $cfg->set_model_directory(MODELS_DIR);
    $cfg->set_connections(['development' => MYSQL_CONN_DEV]);
});

/**
 * Start application execution
 */
$app->run();