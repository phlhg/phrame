<?php

    namespace Helper;

    Class Upload {

        private static $files;

        public static function get($name){
            if(!Self::exists($name)){ return false; }
            $list = [];
            foreach(Self::files()[$name] as $file)
                $list[] = new UploadFile($file);
            return $list;
        }

        public static function exists($name){
            return isset(Self::files()[$name]) && count(Self::files()[$name]) > 0;
        }

        public static function exist($names){
            foreach($names as $name)
                if(!Self::exists($name)){ return false; }
            return true;
        }

        public static function files(){
            if(!isset(Self::$files)){ Self::normalize(); }
            return Self::$files;
        }

        private static function normalize(){
            Self::$files = [];
            foreach(array_keys($_FILES) as $file){
                if(is_array($_FILES[$file]["name"])){
                    $count = count($_FILES[$file]["name"]);
                    for($i = 0; $i < $count; $i++){
                        if($_FILES[$file]["error"][$i] != 4){
                            foreach(array_keys($_FILES[$file]) as $property){
                                Self::$files[$file][$i][$property] = $_FILES[$file][$property][$i];
                            }
                        }
                    }
                } else {
                    if($_FILES[$file]["error"] != 4){
                        foreach(array_keys($_FILES[$file]) as $property){
                            Self::$files[$file][0][$property] = $_FILES[$file][$property];
                        }
                    }
                }
            }
        }

    }

    class UploadFile {

        public $name;   
        public $type;
        public $size;
        public $tmp_name;
        public $error;

        public function __construct($file){
            $this->name = $file["name"];
            $this->type = $file["type"];
            $this->size = $file["size"];
            $this->tmp_name = $file["tmp_name"];
            $this->error = $file["error"];
        }
    
        public function saveTo($path){
            return move_uploaded_file($this->tmp_name, $path);
        }

        public function ext(){
            return pathinfo($this->name, PATHINFO_EXTENSION);
        }

        public function content(){
            return file_get_contents($this->tmp_name);
        }

    }