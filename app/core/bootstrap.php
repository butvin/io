<?php

/**
 * Start the application.
 */
$app = new \Butvin\Core\Route();

/**
 * Custom DB connection state
 */
$conn = \Butvin\Core\DB::getInstance();
if ($conn) {
    var_dump(PDO::getAvailableDrivers());
    //session_start();

}


/**
 * Active Record initialization.
 * https://packagist.org/packages/php-activerecord/php-activerecord
 * https://github.com/jpfuentes2/php-activerecord
 */
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('.');
    $cfg->set_connections(
        [
            'development' => MYSQL_CONN_DEV,
            'sandbox' => 'mysql://invalid',
            'production' => MYSQL_CONN_PROD,
        ]
    );
});

/**
 * Set primary connection configuration.
 */
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_default_connection('development');
});

/**
 ***************************************************************************
 */

//$loader = new \Twig\Loader\ArrayLoader([
//    'index' => 'Hello {{ name }}!',
//]);
//$twig = new \Twig\Environment($loader);
//echo $twig->render('index', ['name' => 'Fabien']);


//
$loader = new \Twig\Loader\FilesystemLoader(APP_DIR.'/resources/');

$twig = new \Twig\Environment($loader,
    [
        //'cache' => APP_DIR.'/resources/cached/',
    ]
);

echo $twig->render('index.php', ['name' => 'Butvin']);
