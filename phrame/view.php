<?php

    class View {

        private $content = "";
        private $name = "";
        private $file = "";
        private $vars = [];

        public function __construct($name){
            $this->name = $name;
            $this->init();
        }

        private function init(){
            $parts = explode("/",strtolower($this->name));
            if($parts[0] == "phrame"){ 
                array_shift($parts);
                $this->file = dirname(__FILE__)."/default/views/".join("/",$parts).".php";
            } else {
                $this->file = dirname(__FILE__)."/app/views/".join("/",$parts).".php";
            }
        }

        private function load(){
            $this->content = "";
            ob_start();
                $_VIEW = $this;
                require($this->file);
                $this->content = ob_get_contents();
            ob_end_clean();
        }

        public function render(){
            $this->load();
            return $this->content;
        }

        public function has($name){
            return isset($this->vars[$name]);
        }

        public function get($name, $default=NULL){
            if(!$this->has($name)){ return $default; }
            return $this->vars[$name];
        }

        public function set($name, $value){
            $this->vars[$name] = $value;
            return true;
        }

        public function var($name, $value=NULL){
            if($value == NULL){ return $this->get($name); }
            return $this->set($name, $value); 
        }

    }

?>