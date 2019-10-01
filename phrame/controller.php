<?php

    class Controller {

        protected $route;
        protected $view;

        function __construct($route){
            $this->route = $route;
            $this->view("Phrame/noView");
        }

        function Main(){
            
        }

        protected function view($name){
            $this->view = new View($name);
        }

        protected function arg($name,$value=NULL){
            return $this->route->arg($name,$value);
        }

        protected function refresh(){
            return $this->route->refresh();
        }

        protected function reroute(...$args){
            return $this->route->reroute(...$args);
        }

        protected function redirect(...$args){
            return $this->route->redirect(...$args);
        }

        public function render(){
            return $this->view->render();
        }

    }

?>