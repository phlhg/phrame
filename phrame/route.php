<?php

    class Route {

        private $router;
        private $pattern;
        private $action;
        private $aClass;
        private $aMethod;
        private $controller;
        private $args = [];

        public function __construct($router, $pattern, $action){
            $this->router = $router;
            $this->pattern = $pattern;
            $this->action = explode("::",$action);
            $this->aClass = $this->action[0];
            $this->aMethod = (isset($this->action[1]) ? $this->action[1] : "Main");
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
            $parts = explode("/",$this->aClass);
            if(strtolower($parts[0]) == "phrame"){ array_shift($parts); $class = "Default\Controllers\\".join("\\",$parts);
            } else {  $class = "App\Controllers\\".join("\\",$parts); }
            $this->controller = new $class($this);
            $method = $this->aMethod;
            $this->controller->$method();
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
                $this->args[strtolower($arg)] = [ "value" => NULL, "regex" => '.+' ];
            }
        }

        public function arg($name,$value=NULL){
            if(isset($value))
                return $this->argset($name,$value);
            return $this->argget($name);
        }

        public function argget($name){
            if(!isset($this->args[$name])){ return NULL; }
            return $this->args[$name]["value"];
        }

        public function argset($name,$value){
            return $this->args[$name]["value"] = $value;
        }

        public function refresh(){
            $url = $this->pattern;
            foreach($this->args as $name => $arg){
                $url = str_replace("{".$name."}",$arg["value"],$url);
            }
            return $this->router->redirect($url);
        }

        public function reroute(...$args){
            return $this->router->reroute(...$args);
        }

        public function redirect(...$args){
            return $this->router->redirect(...$args);
        }

    }

?>