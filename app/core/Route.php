<?php


namespace Butvin\Core;


class Route
{
    protected string $action;

    protected string $controller;

    protected string $uri;

    public function __construct( )
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $routes = explode('/', $this->uri);
        if (!empty($routes[1])) {
            $this->controller = $routes[1];
        }
        if (!empty($routes[2])) {
            $this->action = $routes[2];
        }
    }

    public function start()
    {

    }

    public function dispatchUri()
    {
        echo $this->action;
        echo $this->controller;
    }

    public function displayUri()
    {
         echo $this->uri;

    }

    public function ErrorPage404() {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $url . '404');
    }

}