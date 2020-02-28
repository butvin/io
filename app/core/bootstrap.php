<?php

/**
 * Start the application.
 */
$app = new \Butvin\Core\Route();

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
    $cfg->set_model_directory('.');
    $cfg->set_connections(
        [
            // 'development' => MYSQL_CONN_DEV,
            'production' => MYSQL_CONN_PROD,
        ]
    );
});

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_default_connection('production');
});

/**
 * Start application execution
 */
$app->run();