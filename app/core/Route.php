<?php


namespace Butvin\Core;


use Butvin\Controllers\TicketController;

class Route
{
    protected string $uri;
    static protected string $ctrNamespace = '\\Butvin\\Controllers\\';

    protected string $controller;
    protected string $action;

    protected string $param;

    protected array $queriesParams;


    public function __construct()
    {
        $this->uri = trim($_SERVER['REQUEST_URI']);
    }

    public function run()
    {
        $this->parseUri();
        $this->execute();
    }

    public function execute()
    {
        $ctrClassName = ucfirst($this->controller).'Controller';
        $actionName = mb_strtolower($this->action).'Action';

        $param = $this->param;
        $queriesParams = $this->queriesParams;

        var_dump($ctrClassName, $actionName, $param, $queriesParams);

        $ctrClass = self::$ctrNamespace.$ctrClassName;

        $exec = new $ctrClass();
        $exec->$actionName();
        //var_dump($exec, $ctrClass);
    }

    public function parseUri()
    {
        $routes = explode('/', $this->uri);

        $this->controller = (isset($routes[1]) && !empty($routes[1])) ? $routes[1] : 'ticket';

        $this->action = (isset($routes[2]) && !empty($routes[2])) ? $routes[2] : 'index';

        $this->param = (isset($routes[3]) && !empty($routes[3])) ? $routes[3] : '';

        $queriesParams = [];
        if ($queries = parse_url( $this->uri, PHP_URL_QUERY) ) {
            parse_str($queries, $queriesParams);
            $this->queriesParams = $queriesParams;
        } else {
            $this->queriesParams = [];
        }

//        var_dump($this->controller);
//        var_dump($this->action);
//        var_dump($this->param);
//        var_dump($queriesParams);
    }


    public function ErrorPage404() {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $url . '404');
    }

}