<?php

namespace Butvin\Controllers;

use \Butvin\Core\BaseController;
use \Butvin\Core\BaseView;
use \Butvin\Models\Ticket;
use \Twig\Environment;

/**
 * Class TicketController
 * @package Butvin\Controllers
 */
class TicketController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Ticket Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new tickets as well as their
    | validation and creation. By default this controller uses to
    | provide this functionality .
    |
    */
    protected static Environment $twigEnv;

    protected BaseView $view;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $data = [];

        try {
            if ( Ticket::count() > 0 ) {
                $tickets = Ticket::all();
                foreach ($tickets as $ticket) {
                    $data[] = [
                        'user_id' => $ticket->user_id,
                        'status' => $ticket->status,
                        'created_at' => $ticket->created_at,
                    ];
                }
            }
        } catch (\ActiveRecord\RecordNotFound $e) {
           $e->getMessage();
        }
//var_dump($data);
        if (!empty($data)) {
            $twig = parent::getTwigEnvironment();
            echo $twig->render('ticket\index.twig', ['data' => $data]);
        }

    }

    public function create()
    {
        $twig = parent::getTwigEnvironment();
        echo $twig->render('ticket\create.twig');
    }

}