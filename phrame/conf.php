<?php

    class Conf {

        private static $data = [];

        public static function init(){
            Self::load();
        }

        private static function load(){
            foreach([PHRAME_PATH."default/",PHRAPP_PATH] as $location){
                $path = $location."conf.json";
                $data = (file_exists($path) ? json_decode(file_get_contents($path),true) : []);
                Self::$data = array_merge(Self::$data,$data);
            }
        }

        public static function get($property,$default=NULL){
            $data = Self::$data;
            foreach(explode("/",$property) as $step){
                if(!isset($data[$step])){ return $default; }
                $data = $data[$step];
            }
            return $data;
        }

        public static function exists($property){
            $data = Self::$data;
            foreach(explode("/",$property) as $step){
                if(!isset($data[$step])){ return false; }
            }
            return True;
        }

    }


?>