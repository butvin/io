<?php


namespace Butvin\Core;

use \Exception;

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

//final class BaseView
class BaseView
{
    protected static $twigEnv = null;

    protected static array $env = array(
            'debug' => true,
            'charset' => 'utf-8',
            'cache' => false,
            'auto_reload' => true
        );

    private function __construct() {}

    private function __clone () {}

    private function __wakeup () {
         return new Exception("Cannot un serialize singleton object");
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array( [self::getTwigEnvironment(), $method], $args);
    }

    public static function getTwigEnvironment() :Environment
    {
        if (self::$twigEnv === null) {
            try {
                $loader = new FilesystemLoader(VIEWS_DIR.'/');
                self::$twigEnv = new Environment($loader, self::$env);
            } catch(Exception $e) {
                echo $e->getMessage();
            }
            // return self::$twigEnv;
        }
        return self::$twigEnv;
    }

}