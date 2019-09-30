<?php

    namespace Helper;

    Class Upload {

        public static function get($name){
            if(!Self::exists($name))
                return NULL;
            return new UploadCollection($_FILES[$name]);
        }

        public static function exists($name){
            return isset($_FILES[$name]);
        }

        public static function exist($names){
            foreach($names as $name)
                if(!Self::exists($name)){ return false; }
            return true;
        }

    }

    class UploadCollection {

        public $files = [];
        public $normalized = [];

        public function __construct($files){
            $this->normalize($files);

            foreach($this->normalized as $file){
                $this->add($file);
            }
        }

        public function get($id=0){
            if(!isset($this->files[$id])){ return false; }
            return $this->files[$id];
        }

        public function exists($id){
            return isset($this->files[$id]) and $this->files[$id]->error != 4;
        }

        private function add($file){
            $this->files[] = new UploadFile($file);
        }

        private function normalize($files){
            $this->normalized = [];
            $count = count($files["name"]);
            for($i = 0; $i < $count; $i++){
                foreach(array_keys($files) as $property){
                    $this->normalized[$i][$property] = $files[$property][$i];
                }
            }
            return $this->normalized;
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


    }