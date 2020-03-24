<?php

namespace Butvin\Models;

use \Butvin\Core\BaseModel;

class Ticket extends BaseModel
{
    public static $table_name = 'tickets';

    public static array $validates_uniqueness_of = array();

    public static $primary_key = 'tickets.id';

}