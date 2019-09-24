<?php

    class Controller {

        protected $route;
        protected $view;

        function __construct($route){
            $this->route = $route;
        }

        function Main(){
            $this->view("Phrame/noView");
        }

        protected function view($name){
            $this->view = new View($name);
        }

        protected function arg($name){
            return $this->route->arg($name);
        }

        private function reroute(...$args){
            return $this->route->reroute(...$args);
        }

        private function redirect(...$args){
            return $this->route->redirect(...$args);
        }

        public function render(){
            return $this->view->render();
        }

    }

?>