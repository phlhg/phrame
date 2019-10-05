<?php

    namespace Model;

    class SQL {

        protected static $db;

        protected static function db($identifier){
            return \Database\Manager::get($identifier);
        }

        protected static function query($prepared,$arguments=[]){
            $q = Self::db(Self::$db)->connection()->prepare($prepared);
            $q->execute($arguments);
            return $q;
        }

    }

?>