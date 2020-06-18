<?php

namespace Butvin\Core;

use \Twig\Environment;

/**
 * Class BaseController
 * @package Butvin\Core
 */
abstract class BaseController
{
    protected BaseView $view;
    protected BaseModel $model;
    protected static Environment $twigEnv;

    public function __construct()
    {
       // toDo: code
    }

    /**
     * @return \Twig\Environment
     */
    public function getTwigEnvironment() :\Twig\Environment
    {
        return BaseView::getTwigEnvironment();
    }

    /**
     * Pass data in json format for AJAX
     * @param bool $isError
     * @param null $data
     */
    public static function showResultJson(bool $isError, $data = null)
    {
        $response = [];

        if ($isError === false && isset($data)) {
            $response = [
                'status' => 'ok',
                'data' => (gettype($data) == 'array') ? $data : implode(', ', $data),
            ];
        }
        elseif ($isError === true) {
            $response = [
                'status' => 'error',
                'data' => (gettype($data) == 'null') ? 'Undefined Error: Error message was not set' : implode(', ', $data),
            ];
        }
        else {
            $response = [
                'status' => 'fatal error',
                'data' => 'Undefined Error'
            ];
        }

        if (!empty($response)) {
            echo json_encode($response);
            return;
        }
    }

    abstract public function index();
}