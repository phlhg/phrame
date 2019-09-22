<?php

    class Route {

        private $router;
        private $pattern;
        private $action;
        private $controller;

        public function __construct($router, $pattern, $action){
            $this->router = $router;
            $this->pattern = $pattern;
            $this->action = $action;
        }

        public function match($url){
            return $this->pattern == $url;
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



    }

?>