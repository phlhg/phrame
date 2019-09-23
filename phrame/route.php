<?php

    class Route {

        private $router;
        private $pattern;
        private $action;
        private $controller;
        private $args = [];

        public function __construct($router, $pattern, $action){
            $this->router = $router;
            $this->pattern = $pattern;
            $this->action = $action;
            $this->extractArgs();
        }

        public function match($url){
            if(!preg_match($this->regex(),$url,$matches)){ return false; }
            foreach($this->args as $name => $arg){
                if(isset($matches[$name])){
                    $this->args[$name]["value"] = $matches[$name];
                }
            }
            return true;
        }

        private function regex(){
            $pattern = str_replace("/","\/",$this->pattern);
            foreach($this->args as $name => $arg){
                $pattern = str_ireplace("{".$name."}","(?P<".$name.">".$arg["regex"].")",$pattern);
            }
            $pattern = '/^'.$pattern.'$/i';
            return $pattern;
        }

        public function run(){
            $class = "App\Controllers\\".str_replace("/","\\",$this->action);
            $this->controller = new $class($this);
            $this->controller->Main();
            return $this;
        }

        public function render(){
            echo $this->controller->render();
        }

        /*ARGS*/

        public function where($args){
            foreach($args as $arg => $regex){
                $this->args[$arg]["regex"] = $regex;
            }
        }

        private function extractArgs(){
            preg_match_all('/{([\w\d]+)}/i',$this->pattern,$matches);
            foreach($matches[1] as $arg){
                $this->args[strtolower($arg)] = [ "value" => Null, "regex" => '.+' ];
            }
        }

        public function arg($name){
            if(!isset($this->args[$name])){ return Null; }
            return $this->args[$name]["value"];
        }


    }

?>