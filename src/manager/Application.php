<?php
namespace app\manager;

use Exception;

class Application{
    protected static $alias = [];
    protected static $user;
    protected static $config;

    public static function setAlias($alias, $path){
        self::$alias[$alias] = $path;
    }

    public static function getAlias($alias){
        if(!isset(self::$alias[$alias])){
            throw new Exception("Path to $alias not found.", 500);
        }
        return self::$alias[$alias];
    }

    /*public static function getUser(){
        if(isset($_SESSION['user']) and is_null(self::$user)){
            self::$user = User::get(['id' => $_SESSION['user']['id']]);
            if(!self::$user){
                unset($_SESSION['user']);
            }
        }

        return self::$user;
    }*/

    public static function getConfig(){
        if(is_null(self::$config)){
            try {
                self::$config = require self::getAlias('@config')."/main.php";
            } catch (Exception $e) {
                throw $e;
            }
        }

        return self::$config;
    }

    public static function setFlash($key, $value){
        $_SESSION['flash'][$key] = (array) $value;
    }
}