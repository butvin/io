<?php


namespace Butvin\Core;

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

class BaseView
{
    protected Environment $twig;

    protected FilesystemLoader $loader;

    public static array $env =
        [
            'debug' => true,
            'charset' => 'utf-8',
            'cache' => false
        ];

    public function __construct()
    {
        $loader =  new FilesystemLoader(VIEWS_DIR.'/');
        $this->loader = $loader;

        $twig = new Environment($loader, self::$env);
        $this->twig = $twig;
    }

}