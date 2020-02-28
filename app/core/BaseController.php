<?php


namespace Butvin\Core;

use Butvin\Core\BaseView;
use Butvin\Core\BaseModel;

abstract class BaseController
{
    protected BaseView $view;
    protected BaseModel $model;

    public function __construct(BaseView $view, BaseModel$model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    abstract public function indexAction();
}