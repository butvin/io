<?php

namespace Butvin\Core;

use \Twig\Environment;

/**
 * Class BaseController
 * @package Butvin\Core
 */
abstract class BaseController
{

    protected BaseView $view;
    protected BaseModel $model;

    protected static Environment $twigEnv;

    public function __construct()
    {
       // toDo: code
    }

    /**
     * @return \Twig\Environment
     */
    public function getTwigEnvironment() :\Twig\Environment
    {
        return BaseView::getTwigEnvironment();
    }

    abstract public function index();
}