<?php

namespace Butvin\Core;

use \Exception;
use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

/**
 * Class BaseView
 *
 * Provide a generation singleton instance of twig environment object
 * in the application that will handle all calls.
 * @package Butvin\Core
 */
final class BaseView
{
    /**
     * @var \Twig\Environment|null
     */
    private static ?\Twig\Environment $twigEnv = null;
    /**
     * Twig environment settings
     * @var array
     */
    protected static array $env = array(
            'debug' => true,
            'charset' => 'utf-8',
            'cache' => false,
            'auto_reload' => true
        );

    /**
     * Close BaseView properties via magic methods:
     * constructor, clone and wakeup.
     */
    private function __construct() {}

    private function __clone () {}

    private function __wakeup () {
         return new Exception("Cannot un serialize singleton object");
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array( [self::getTwigEnvironment(), $method], $args);
    }

    /**
     * Twig initialization
     * Return Twig environment object as singleton static method.
     * https://twig.symfony.com/doc/3.x/intro.html
     * @return Environment
     */
    public static function getTwigEnvironment() :Environment
    {
        if (self::$twigEnv === null) {
            try {
                $loader = new FilesystemLoader(VIEWS_DIR.'/');
                self::$twigEnv = new Environment($loader, self::$env);

                // self::$twigEnv->getExtension(\Twig\Extension\CoreExtension::class)->setTimezone('Europe/Kiev');
                // self::$twigEnv->addExtension(new \Twig\Extension\SandboxExtension());

                self::$twigEnv->addExtension(new \Twig\Extension\DebugExtension());
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }
        return self::$twigEnv;
    }

}