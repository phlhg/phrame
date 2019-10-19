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

        public function title($value){
            $this->set("html_title",$value);
        }

        public function style($href){
            $this->set("html_styles",array_merge(
                $this->get("html_styles",[]),
                [ $href ]
            ));
        }

        public function script($src){
            $this->set("html_scripts",array_merge(
                $this->get("html_scripts",[]),
                [ $src ]
            ));
        }

        public function setAll($property){
            foreach($propery as $name => $value){
                $this->set($name, $value);
            }
        }

    }

?>