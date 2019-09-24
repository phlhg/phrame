<?php

    class View {

        private $content = "";
        private $name = "";
        private $vars = [];

        public function __construct($name){
            $this->name = strtolower($name);
        }

        private function load(){
            $this->content = "";
            ob_start();
                $_VIEW = $this;
                require dirname(__FILE__)."/default/views/".$this->name.".php";
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