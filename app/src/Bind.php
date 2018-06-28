<?php

namespace app\src;

class Bind 
{
    private static $bind = [];

    public static function set($name, $value)
    {
        if (!isset(self::$bind[$name])) {
            self::$bind[$name] = $value;
        }
    }

    public static function get($name)
    {
        if (isset(self::$bind[$name])) {
            return self::$bind[$name];
        }
    }
}