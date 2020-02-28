<?php


namespace Butvin\Core;

abstract class BaseController
{
    protected BaseView $view;
    protected BaseModel $model;

    public function __construct()
    {
        $this->view = new BaseView();
        $this->model = new BaseModel();
    }

    abstract public function indexAction();
}