<?php

//require_once 'DB.php';

$runApplication = new \Butvin\Core\Route();

$conn = \Butvin\Core\DB::getInstance();
if ($conn) {
    $conn->prepare("SHOW TABLES;");
    var_dump(PDO::getAvailableDrivers());
}

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

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_default_connection('development');
});


var_dump($_SERVER['REQUEST_URI']);