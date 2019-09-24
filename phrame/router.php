<?php

    class Router {

        private $app;
        private $routes = [];
        private $active = false;

        public function __construct($app){
            $this->app = $app;
            $this->load();
        }

        public function run($url){
            $this->active = $this->find($url);
            if(!$this->active){ 
                return false; 
            }
            return $this->active->run();
        }

        private function find($url){
            if(count($this->routes) < 1){ return $this->reroute('Phrame/NoRoutes'); }
            foreach($this->routes as $route){
                if($route->match($url)){ 
                    return $route; 
                }
            }
            return $this->reroute('Phrame/Errors/E404');
        }

        public function set($pattern,$action){
            $this->routes[] = new Route($this, $pattern, $action);
            return end($this->routes);
        }

        public function reroute($action){
            $r = new Route($this,"",$action);
            $r->run();
            return $r;
        }

        public function redirect($url){
            header("Location: ".$url);
        }

        public function render(){
            return $this->active->render();
        }

        private function load(){
            $_ROUTER = $this;
                if(file_exists(dirname(__FILE__)."/app/routes.php")){ require_once(dirname(__FILE__)."/app/routes.php"); }
                else { require_once(dirname(__FILE__)."/default/routes.php"); }
            unset($_ROUTER);
        }

    }

?>