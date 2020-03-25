<?php

namespace Butvin\Models;

use ActiveRecord\Model;
use \Butvin\Core\BaseModel;

class Ticket extends Model
{
    public static $table_name = 'tickets';

    public static array $validates_uniqueness_of = array();

    public static $primary_key = 'tickets.id';

    public static $attr_accessible = array('user_id','text');

}