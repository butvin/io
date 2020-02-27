<?php


namespace Butvin\Core;


class Route
{
    protected string $action = 'index';

    protected string $controller = 'index';

    public function dispatchUri(string $uri)
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }
        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }
    }

}