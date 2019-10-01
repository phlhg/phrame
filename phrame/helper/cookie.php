<?php

    namespace Helper;

    class Cookie {

        public static function get($name){
            if(!Self::exists($name))
                return NULL;
            return $_COOKIE[$name];
        }

        public static function set($name,$value,$expires=365,$path="/",$domain=NULL,$secure=false,$httponly=false){
            return setcookie($name,$value,time()+60*60*24*$expires,$path,$domain,$secure,$httponly);
        }

        public static function remove($name){
            return setcookie($name,"",1);
        }

        public static function exists($name){
            return isset($_COOKIE[$name]);
        }

        public static function exist($names){
            foreach($names as $name)
                if(!Self::exists($name)){ return false; }
            return true;
        }

    }