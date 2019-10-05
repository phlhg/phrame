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

            $this->header = new View\Header($this);
            $this->body = new View\Body($this);
            $this->var = new View\Variables();
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

?>