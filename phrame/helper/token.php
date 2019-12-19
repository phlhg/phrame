<?php

    namespace Helper;

    class Token {

        public static function get(){
            if(!Session::exists("phrame_token")){ Session::set("phrame_token",Self::generate()); }
            return Session::get("phrame_token");
        }

        public static function validate($token){
            if(!Session::exists("phrame_token")){ return false; }
            return Session::get("phrame_token") == $token;
        }

        private static function generate(){
            return sha1(uniqid("phrame",true));
        }

    }
?>