<?php

    class View {

        public const HTML = "text/html";
        public const JSON = "application/json";

        public $header;
        public $var;

        public $content = "";
        public $name = "";
        public $file = "";

        public function __construct($name){

            $this->name = $name;

            $this->header = new Header($this);
            $this->body = new Body($this);
            $this->var = new Variables();
        }

        public function add($view){
            $this->body->add($view);
        }

        public function render($file=True){
            $this->body->load();
            if($file)
                $this->header->apply();
            return $this->body->content;
        }

        public function contentType($type){
            $this->header->content($type);
        }

    }

    class Header {

        private $view;

        private $statuscode;
        private $headers = [];

        public function __construct($view){
            $this->view = $view;
        }

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

    class Body {

        private $view;
        private $rendering = false;

        public $content = "";

        public function __construct($view){
            $this->view = $view;
        }

        public function load(){
            $this->content = "";
            ob_start();
                $this->rendering = true;
                    $_VIEW = $this->view;
                    $_VAR = $this->view->var;
                    $_HEADER = $this->view->header;
                    require(Self::getFile($this->view->name));
                $this->content = ob_get_contents();
                $this->rendering = false;
            ob_end_clean();
        }

        public function add($view){
            $_VIEW = $this->view;
            $_VAR = $this->view->var;
            $_HEADER = $this->view->header;
            if($this->rendering)
                require(Self::getFile($view));
        }

        public static function getFile($name){
            $parts = explode("/",strtolower($name));
            $file = "";
            if($parts[0] == "phrame"){ array_shift($parts); $file .= PHRAME_PATH."/default/"; } else { $file .= PHRAPP_PATH; }
            $file .= "views/".join("/",$parts).".php";
            return $file;
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