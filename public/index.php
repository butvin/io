<?php

/**
 * Load config
 */
require_once __DIR__.'/../app/config.php';

/**
 * Composer
 */
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| application.
|
*/
//require __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/autoload.php';

/**
 * Starts application
 */
/*
|--------------------------------------------------------------------------
| Load the application.
|--------------------------------------------------------------------------
|
| This bootstraps the  and gets it ready for use, then it
| will load up this application and send
| the responses back to the browser.
|
*/
require_once __DIR__.'/../app/core/bootstrap.php';


