<?php

Class Registry
{

    private static $state = 0;

    /**
     *  session start
     */
    public static function init()
    {
        if (self::$state <> 1) {
            session_start();
            self::$state = 1;
        }
    }

    /**
     * set session
     * @param type $key
     * @param type $value 
     */
    public static function set($key, $value)
    {
        self::init();
        
        if ($key && $value) {
            $_SESSION[$key] = $value;
        }
    }

    /**
     * fetch session
     * @param type $key
     * @return type 
     */
    public static function get($key)
    {
        self::init();
        
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    /**
     * delete session
     * @param type $key 
     */
    public static function destory($key='')
    {
        self::init();
        
        if (!key) {
            session_destroy();
        } else {
            if (isset($_SESSION[$key])) {
                unset($_SESSION[$key]);
            }
        }
    }

}