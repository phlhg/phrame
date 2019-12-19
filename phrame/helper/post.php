<?php

    namespace Helper;

    class POST {

        public static function get($name){
            if(!Self::exists($name))
                return false;
            return $_POST[$name];
        }

        public static function exists($name){
            return isset($_POST[$name]);
        }

        public static function exist($names){
            foreach($names as $name) 
                if(!Self::exists($name)){ return false; }
            return true;
        }

    }