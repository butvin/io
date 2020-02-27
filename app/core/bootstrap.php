<?php

//require_once 'DB.php';

$runApplication = new \Butvin\Core\Route();

$conn = \Butvin\Core\DB::getInstance();
if ($conn) {
    $conn->prepare("SHOW TABLES;");

    var_dump($_SERVER['REQUEST_URI']);

    var_dump(PDO::getAvailableDrivers());
}
