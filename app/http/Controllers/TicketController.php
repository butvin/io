<?php


namespace Butvin\Controllers;

use \Butvin\Core\BaseController;
use \Butvin\Core\BaseView;
use \Butvin\Core\BaseModel;

class TicketController extends BaseController
{
    protected BaseView $view;
    protected BaseModel $model;

    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        // TODO: Implement indexAction() method.
        var_dump('TicketController->indexAction');
    }
}