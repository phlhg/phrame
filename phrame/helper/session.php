<?php

    namespace Helper;

    class Session {

        public static function get($name){
            if(!Self::exists($name))
                return NULL;
            return $_SESSION[$name];
        }

        public static function getAll(){
            return $_SESSION;
        }

        public static function set($name,$value){
            return $_SESSION[$name] = $value;
        }

        public static function exists($name){
            return isset($_SESSION[$name]);
        }

        public static function clear($name){
            unset($_SESSION[$name]);
        }

        public static function clearAll(){
            $_SESSION = [];
        }

    }
?>