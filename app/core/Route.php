<?php

namespace Butvin\Core;

/**
 * Class Route
 * @package Butvin\Core
 */
class Route
{
    /**
     * The path to the "home" route of the application.
     */
    public const HOME = '/';

    /**
     * Define "home" controller and action of the application.
     */
    public const HOME_CONTROLLER = 'ticket';
    public const HOME_ACTION = 'index';

    /**
     * Store in class property a request variable <$_SERVER['REQUEST_URI']>.
     * @var string|null
     */
    protected ?string $uri = null;

    /**
     * This namespace is applied to your controller routes.
     * In addition, it is set as the URL generator's root namespace.
     * @var string
     */
    protected string $controllersNamespace = '\\Butvin\\Controllers\\'; // try to set 'Butvin\Controllers'

    protected string $controller;
    protected string $action;
    protected string $param;

    protected array $queryParams;

    /**
     * Route constructor.
     * Application
     * http://<HOST>/<ConrollerName>/<actionName>/<actionParametr>?<$queryParams>
     */
    public function __construct()
    {
        if ($this->uri === null)
            $this->uri = trim($_SERVER['REQUEST_URI']);

        if ($this->uri === Route::HOME) {
            $this->controller =  Route::HOME_CONTROLLER;
            $this->action = Route::HOME_ACTION;
        }
    }

    /**
     * Access point to run the application.
     */
    public function run()
    {
        try {
            $this->parseRequestUri();
            $this->build();
        } catch (\Exception $e) {
            $e->getMessage();
        }

    }

    /**
     * This method is determining necessary controller <ClassController> and
     * uses its method action <action> with specific
     * <param> or <queryParams> of this controller if any were requested.
     *
     */
    protected function build()
    {
        $ctrClassName = ucfirst($this->controller).'Controller';
        $actionName = mb_strtolower($this->action);

        if( !empty($this->param) ) {
            $param = $this->param;
        }

        if( !empty($this->queryParams) ) {
            $queryParams = $this->queryParams;
        }

        // Trying to execute application
        try {
            $ctrFullClassName = $this->controllersNamespace.$ctrClassName;

            if (! class_exists($ctrFullClassName)) {
                Route::Page404();
            }
            $controllerInstance = new $ctrFullClassName;

            if (! method_exists($controllerInstance, $this->action)) {
                // $errorMsg = "Class {$controllerInstance} has no method: {$this->action}";
                Route::Page404();
            }
            $controllerInstance->$actionName();
        } catch (\Exception $e) {
             $e->getMessage();
        }

    }

    /**
     * Provides parsing URI from client requests for composing specific routes.
     */
    protected function parseRequestUri()
    {
        $routes = explode('/', $this->uri);

        $this->controller = (isset($routes[1]) && !empty($routes[1])) ? $routes[1] : Route::HOME_CONTROLLER;
        $this->action = (isset($routes[2]) && !empty($routes[2])) ? $routes[2] : Route::HOME_ACTION;
        $this->param = (isset($routes[3]) && !empty($routes[3])) ? $routes[3] : '';

        $queryParams = [];
        if ($queries = parse_url( $this->uri, PHP_URL_QUERY) ) {
            parse_str($queries, $queryParams);
            $this->queryParams = $queryParams;
        } else {
            $this->queryParams = [];
        }
//        var_dump($this->controller);
//        var_dump($this->action);
//        var_dump($this->param);
//        var_dump($queryParams);
    }

    /**
     * Error 404 page.
     * Optional argument message with Exception error text.
     * @param string $message
     */
    public static function Page404(string $message = 'ERROR') {
        $message = 'ПИЗДА НАХУЙ БЛЯТЬ, ТАКОГО РОУТА НЕТУ!!!<br /> ПРОСТО НЕТ БЛЯТЬ!!!';
        if ( !empty($message)) {
            echo '<div style="background-color: tomato; color: aliceblue;">'.$message.'</div><br>';
            die();
        }

//        $host = 'http://'.$_SERVER['HTTP_HOST'].Route::HOME;
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
//        header('Location:'.$host.'404');
    }

}