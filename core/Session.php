<?php

namespace Core;

class Session
{
    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function has($key)
    {
        return (bool) static::get($key); // the static::get() method returns the value of the provided key in the session if it exists and if not it defaults to null. converting these valuets into booleans using the (bool) key word we get true for truthy values and false for null (falsy value)
    }
    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }
    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function flush()
    {
        unset($_SESSION);
    }

    public static function destroy()
    {
        static::flush(); // clear the session superglobal

        session_destroy(); // destroy the server session file

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly'],); // destroy the cookie file on the client
    }
}
