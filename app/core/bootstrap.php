<?php

/**
 * Twig.
 */
//$twigEnv = array(
//    'debug' => true,
//    'charset' => 'utf-8',
//    'cache' => false
//);
//$loader =  new Twig\Loader\FilesystemLoader(VIEWS_DIR.'/');
//$twig = new Twig\Environment($loader, $twigEnv);

/**
 * Start the application.
 */
$app = new Butvin\Core\Route();

/**
 * Custom DB connection state
 */
if ( $conn = \Butvin\Core\DB::getInstance() ) {
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
//    $cfg->set_model_directory(MODELS_DIR);
    $cfg->set_connections(['development' => MYSQL_CONN_DEV]);
});

/**
 * Start application execution
 */
$app->run();