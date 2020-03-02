<?php


namespace Butvin\Models;


use \Butvin\Core\BaseModel;


class Ticket extends BaseModel
{
    public static $table_name = 'tickets';

    public static array $validates_uniqueness_of = array();

    public static $primary_key = 'tickets.id';

    public function __construct()
    {
        parent::__construct();
    }

//    public static function connection() {
//        static::table();
//    }
//
//    public static function table(){
//        echo get_called_class();
//    }
}