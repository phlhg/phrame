<?php

    namespace Database;

    class Manager {

        private static $databases = [];
        private static $main;

        public static function init(){
            Self::load();
        }

        public static function add($identifier,$host,$dbname,$credentials){
            if(count(Self::$databases) < 1){ Self::$main = $identifier; }
            Self::$databases[$identifier] = new Connection($host,$dbname,$credentials);
            return Self::$databases[$identifier];
        }

        public static function exists($identifier){
            return isset(Self::$databases[$identifier]);
        }

        public static function get($identifier=NULL){
            if(!isset($identifier)){ return Self::getMain(); }
            if(!Self::exists($identifier)){ return false; }
            return Self::$databases[$identifier];   
        }

        public static function getMain(){
            if(!isset(Self::$main)){ return false; }
            return Self::$databases[Self::$main];
        }

        private static function load(){
            if(!file_exists(PHRAPP_PATH."db.php")){ return; }
            require_once(PHRAPP_PATH."db.php");
        }

    }

?>