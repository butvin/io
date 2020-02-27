<?php


namespace Butvin\Core;

use \ActiveRecord\Model;

class BaseModel extends \ActiveRecord\Model
{
    function __construct(array $attributes = array(), $guard_attributes = true, $instantiating_via_find = false, $new_record = true)
    {
        parent::__construct($attributes, $guard_attributes, $instantiating_via_find, $new_record);
    }

}