<?php


namespace Butvin\Core;

use \Butvin\Core\BaseView;

use \Twig\Environment;

abstract class BaseController
{
    protected BaseView $view;
    protected BaseModel $model;

    protected static Environment $twigEnv;

    public function __construct()
    {
       // toDo: code
    }

    public function getTwigEnvironment() :Environment
    {
        return BaseView::getTwigEnvironment();
    }

    abstract public function indexAction();
}