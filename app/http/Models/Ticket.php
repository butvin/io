<?php


namespace Butvin\Models;


use \Butvin\Core\BaseModel;


class Ticket extends BaseModel
{
    public static $table_name = 'tickets';

    public static function connection() {
        static::table();
    }

    public static function table(){
        echo get_called_class();
    }
}