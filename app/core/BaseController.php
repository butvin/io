<?php


namespace Butvin\Core;

use Butvin\Core\BaseView as BaseView;

abstract class BaseController
{
    protected BaseView $view;

    public function __construct(BaseView $view)
    {
        $this->view = $view;
    }

    abstract public function indexAction();
}