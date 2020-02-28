<?php

/**
 * DB connection constants
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'bj');
define('DB_USER', 'butvin');
define('DB_PASS', 'qweqwe');
define('DB_CHAR', 'utf8');

define ('MYSQL_CONN_DEV', 'mysql://'.DB_USER.':'.DB_PASS.'@'.DB_HOST.'/'.DB_NAME.'');
define ('MYSQL_CONN_PROD', 'mysql://'.DB_USER.':'.DB_PASS.'@'.DB_HOST.'/'.DB_NAME.'');

/**
 * Filesystem constants
 */
define('ROOT_HTDOCS_DIR', dirname(__DIR__));
define('APP_DIR', __DIR__.'/http');
define('CORE_DIR', __DIR__.'/core');
