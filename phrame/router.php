<?php

    class Router {

        private $app;
        private $routes = [];
        private $defRoutes = 0;
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
            if(!is_dir(PHRAPP_PATH)){ return $this->reroute("Phrame/NoApp"); }
            if(count($this->routes) < $this->defRoutes+1){ return $this->reroute('Phrame/NoRoutes'); }
            foreach($this->routes as $route){
                if($route->match($url)){ 
                    return $route; 
                }
            }
            return $this->reroute('Phrame/Error::http404');
        }

        public function set($pattern,$action){
            $this->routes[] = new Route($this, $pattern, $action);
            return end($this->routes);
        }

        public function reroute($action){
            $this->active = new Route($this,"",$action);
            $this->active->run();
            return $this->active;
        }

        public function redirect($url){
            header("Location: ".$url);
            exit();
        }

        public function render(){
            return $this->active->render();
        }

        private function load(){
            $this->loadDefRoutes();
            $this->loadAppRoutes();
        }

        private function loadDefRoutes(){
            $_ROUTER = $this;
                if(file_exists(PHRAME_PATH."default/routes.php")){ require_once(PHRAME_PATH."default/routes.php"); }
            unset($_ROUTER);
            $this->defRoutes = count($this->routes);
        }

        private function loadAppRoutes(){
            $_ROUTER = $this;
                if(file_exists(PHRAPP_PATH."routes.php")){ require_once(PHRAPP_PATH."routes.php"); }
            unset($_ROUTER);
        }

    }

?>