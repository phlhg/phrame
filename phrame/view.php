<?php

    class View {

        public $header;
        public $var;

        private $content = "";
        private $name = "";
        private $file = "";

        public function __construct($name){
            $this->header = new Header();
            $this->var = new Variables();
            $this->name = $name;
        }

        private function load(){
            $this->content = "";
            ob_start();
                $_VIEW = $this;
                $_VAR = $this->var;
                $_HEADER = $this->header;
                require(Self::getFile($this->name));
                $this->content = ob_get_contents();
            ob_end_clean();
        }

        public function add($view){
            $_VIEW = $this;
            $_VAR = $this->var;
            $_HEADER = $this->header;
            require(Self::getFile($view));
            return true;
        }

        public function render($file=True){
            if($file){ $this->header->apply(); }
            $this->load();
            return $this->content;
        }

        public static function getFile($name){
            $parts = explode("/",strtolower($name));
            $file = dirname(__FILE__);
            if($parts[0] == "phrame"){ array_shift($parts); $file .= "/default/"; } else { $file .= "/app/"; }
            $file .= "views/".join("/",$parts).".php";
            return $file;
        }

        public static function exists($name){
            return file_exists(Self::getFile($name));
        }

    }

    class Header {

        private $statuscode;
        private $headers = [];

        public function status($code){
            $this->statuscode = $code;
        }

        public function content($type){
            $this->set("Content-Type",$type);
        }

        public function set($property, $value){
            $this->headers[$property] = $value;
        }

        public function apply(){
            if(isset($this->statuscode))
                http_response_code($this->statuscode);
            foreach($this->headers as $property => $value)
                header($property.": ".$value); 
        }

    }

    class Variables {

        private $vars = [];

        public function has($name){
            return isset($this->vars[$name]);
        }

        public function get($name, $default=NULL){
            if(!$this->has($name)){ return $default; }
            return $this->vars[$name];
        }

        public function getAll(){
            return $this->vars;
        }

        public function set($name, $value){
            $this->vars[$name] = $value;
        }

        public function setAll($property){
            foreach($propery as $name => $value){
                $this->set($name, $value);
            }
        }

    }

?>