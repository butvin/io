<?php


namespace Butvin\Core;

use \ActiveRecord\Config;
use \ActiveRecord\Model;


class BaseModel extends Model
{

    public static $table_name = null;

    public static function connection() {
        static::table();
    }

    public function __construct(
        array $attributes = array(),
        $guard_attributes = true,
        $instantiating_via_find = false,
        $new_record = true
    )
    {
//        Config::initialize(function($cfg)
//        {
//            $cfg->set_connections(['development' => MYSQL_CONN_DEV]);
//        });
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);

    }

//    public function insert($data)
//    {
//        $this->db->insert(self::$table_name, $data);
//        $this->insert()
        // return $this->db->insert_id();
//    }

}