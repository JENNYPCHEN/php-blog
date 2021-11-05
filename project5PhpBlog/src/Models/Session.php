<?php

namespace App\Models;

class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : "";
    }
    public static function del($Key)
    {
        if (isset($_SESSION[$Key])) {
            unset($_SESSION[$Key]);
            return false;
        }
    }
}
