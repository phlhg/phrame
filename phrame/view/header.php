<?php

    namespace View;

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

?>