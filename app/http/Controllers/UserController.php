<?php


namespace Butvin\Controllers;

use \Butvin\Core\BaseController;
use \Butvin\Core\BaseView;
use \Butvin\Models\User;

class UserController extends BaseController
{

    protected BaseView $view;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // TODO: Implement indexAction() method.
    }

    public function register()
    {
        $data = [];
        $twig = parent::getTwigEnvironment();
        echo $twig->render('user\register.twig', ['data' => $data]);
    }

    /**
     * User save action
     */
    public function save()
    {
        $request = (!empty($_POST)) ? ($_POST) : -1;
        var_dump($request);
        die('User Save Action DIE!!!!');
    }
}