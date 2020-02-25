<?php

ini_set('display_errors', 1);
error_reporting('E_ALL');

/**
 * Composer
 */
require '../vendor/autoload.php';

var_dump($_SERVER["REQUEST_URI"]);

session_start();