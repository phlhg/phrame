<?php

    namespace View;

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