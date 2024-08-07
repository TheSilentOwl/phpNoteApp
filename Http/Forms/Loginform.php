<?php

namespace Http\Forms;

use core\Validator;

class Loginform
{
    protected $errors = [];

    function validate($email, $password)
    {

        if (!Validator::email($email)) {
            $this->errors['login'] = 'your email is not even in shape';
        }
        if (!Validator::strCheck($password)) {
            $this->errors['login'] = 'password should be provided';
        }
        if (!empty($this->errors)) {
            return false;
        }
        return true;
    }

    function getErrors() {
        return $this->errors;
    }

    function setError($field, $message) {
        $this->errors[$field] = $message;
    }
}
