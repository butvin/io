<?php


namespace Butvin\Core;

//use \ActiveRecord\Config;
use \ActiveRecord\Model;


class BaseModel extends \ActiveRecord\Model
{
    static $table_name = null;

    public function __construct()
    {
        parent::__construct();
    }

}