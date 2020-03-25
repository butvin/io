<?php

namespace Butvin\Controllers;

use \Butvin\Core\BaseController;
use \Butvin\Core\BaseView;
use \Butvin\Models\Ticket;

/**
 * Class TicketController
 *
 * This controller handles the registration of new tickets
 * as well as their validation and creation.
 * By default this controller uses to provide this functionality.
 *
 * @package Butvin\Controllers
 */
class TicketController extends BaseController
{
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
        $data['ticketsCount'] = Ticket::count();
            if ( Ticket::count() > 0 ) {
                try {

//$t = new Ticket();
//$t->user_id = 5;
//$t->text = 'fdsfdsf-ddt-1';
//$t->save();
//var_dump($t);

                    $tickets = Ticket::all();
//var_dump($tickets);
//$data['__origin'] = ($tickets);
                    foreach ($tickets as $ticket) {
                        $data['items'][] = [
                            'user_id' => $ticket->user_id,
                            'text' => $ticket->text,
                            'created_at' => $ticket->created_at,
                        ];
                    }
                } catch (\ActiveRecord\RecordNotFound $e) {
                    $e->getMessage();
                }
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

    public function save() {

    }

}