<?php

    class Controller {

        private $route;
        private $view;

        function __construct($route){
            $this->route = $route;
        }

        function Main(){
            $this->view("Index");
        }

        protected function view($name){
            $this->view = new View($name);
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