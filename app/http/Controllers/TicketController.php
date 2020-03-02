<?php


namespace Butvin\Controllers;

use \Butvin\Core\BaseController;
use \Butvin\Core\BaseView;

use \Butvin\Models\Ticket;

use \Twig\Environment;

class TicketController extends BaseController
{
    protected static Environment $twigEnv;
    protected BaseView $view;

    public function __construct()
    {
        parent::__construct();

    }

    public function indexAction()
    {
        if (false) {
            try {
                $tickets = new Ticket();
                $tickets->user_id = (int) intval( "0" . rand(1,9) . rand(0,9));
                $tickets->text = (string) chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
                $tickets->status = (int) intval( "0" . rand(0,1));
                $tickets->save();
            } catch (\Exception $e) {
                $e->getMessage();
            }
        }
        $result = array();
        try {
            $result[] = Ticket::find('first');
            $result[] = Ticket::find('last');
        } catch (\ActiveRecord\RecordNotFound $e) {
           $e->getMessage();
        }

        if (!empty($result)) {
            $twig = parent::getTwigEnvironment();
            echo $twig->render('index.twig', ['data' => $result]);
        }

    }

}