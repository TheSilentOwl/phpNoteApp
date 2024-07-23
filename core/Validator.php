<?php
namespace core;
class Validator
{
    public static $feedback;
    public static function strCheck($value, $min=1, $max=INF)
    {
        $value = trim($value);
        if (strlen($value) < $min) {
            static::$feedback = "This field should be at leaset $min chars";
            return false;
        } else if (strlen($value) > $max) {
            static::$feedback = "This field shouldn't be more than $max chars";
            return false;
        } else {
            return true;
        }
    }

    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
