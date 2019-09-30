<?php

    namespace Helper;

    class GET {

        public static function get($name){
            if(!Self::exists($name))
                return NULL;
            return $_GET[$name];
        }

        public static function exists($name){
            return isset($_GET[$name]);
        }

        public static function exist($names){
            foreach($names as $name)
                if(!Self::exists($name)){ return false; }
            return true;
        }

    }