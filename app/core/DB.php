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

            try {
                $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
                self::$instance = new PDO($dsn, DB_USER, DB_PASS, self::$options);

            } catch(PDOException $error) {
                echo $error->getMessage();
            }

        }

        return self::$instance;
    }

    /**
    public static function setCharsetEncoding() {
        if (self::$instance instanceof PDO && self::$instance !== null) {
            $sql =  "SET NAMES 'utf8'; SET character_set_connection=utf8;
                    SET character_set_client=utf8; SET character_set_results=utf8";
            try {
                self::$instance->exec($sql);
            } catch(PDOException $error) {
                echo $error->getMessage();
            }
        }
    }

    public static function run($sql, $args = []) {
        if (!$args)
        {
            return self::getInstance()->query($sql);
        }
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
    */

}