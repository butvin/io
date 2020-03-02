<?php

namespace Butvin\Core;
/**
 *  Singleton
 *
 */

use PDO;
use PDOException;

class DB
{
    protected static $instance = null;

    protected static array $options = [
        PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES  => true,
    ];

    private function __construct() {}
    private function __clone () {}
    private function __wakeup () {
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::getInstance(), $method), $args);
    }

    public static function getInstance() {

        if (self::$instance === null) {
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
            try {
                self::$instance = new PDO(
                    (string) $dsn,
                    (string) DB_USER,
                    (string) DB_PASS,
                    (array) self::$options
                );
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }

}