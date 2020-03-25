<?php

namespace Butvin\Models;

use ActiveRecord\Model;

class User extends Model
{
    public static $table_name = 'users';

    public static $primary_key = 'user.id';

}