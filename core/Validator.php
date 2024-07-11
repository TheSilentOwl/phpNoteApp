<?php
namespace core;
class Validator
{
    public $feedback;
    public function strCheck($value, $min=1, $max=INF)
    {
        $value = trim($value);
        if ($this->beforeMin($value, $min)) {
            $this->feedback = "This field should be at leaset $min chars";
            return false;
        } else if ($this->beyondMax($value, $max)) {
            $this->feedback = "This field shouldn't be more than $max chars";
            return false;
        } else {
            return true;
        }
    }

    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function beforeMin($value, $min)
    {
        return strlen($value) < $min;
    }
    protected function beyondMax($value, $max)
    {
        return strlen($value) > $max;
    }
}
