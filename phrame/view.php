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
            $this->init();
        }

        private function init(){
            $parts = explode("/",strtolower($this->name));
            $this->file = dirname(__FILE__);
            if($parts[0] == "phrame"){ array_shift($parts); $this->file .= "/default/"; } else { $this->file .= "/app/"; }
            $this->file .= "views/".join("/",$parts).".php";
        }

        private function load(){
            $this->content = "";
            ob_start();
                $_VIEW = $this;
                $_VAR = $this->var;
                $_HEADER = $this->header;
                require($this->file);
                $this->content = ob_get_contents();
            ob_end_clean();
        }

        public function render($file=True){
            if($file){ $this->header->apply(); }
            $this->load();
            return $this->content;
        }

    }

    class Header {

        private $statuscode = 200;
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
            http_response_code($this->statuscode);
            foreach($this->headers as $propery => $value){ header($property.": ".$value); }
        }

    }

    class Variables {

        public $vars = [];

        public function has($name){
            return isset($this->vars[$name]);
        }

        public function get($name, $default=NULL){
            if(!$this->has($name)){ return $default; }
            return $this->vars[$name];
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