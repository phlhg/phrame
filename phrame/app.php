<?php

    /**
     * Application class file.
     * 
     * @package PHRAME
     * @link http://phlhg.ch/phrame
     * @author Philippe Hugo <info@phlhg.ch>
     * @copyright 2019 Philippe Hugo <info@phlhg.ch>
     */

    class App {

        private $router;

        function __construct(){

            spl_autoload_register(function($name){
                return $this->loadClass($name);
            });

            define("PHRAME_PATH",dirname(__FILE__,1)."/");
            define("PHRAPP_PATH",dirname(__FILE__,2)."/phrapp/");

            Database\Manager::init();
            Conf::init();

            $this->router = new Router($this);

        }

        public function run($method=false, $url=false){

            $method = ( !$method ? $_SERVER['REQUEST_METHOD'] : $method);
            $url = ( !$url ? parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) : $url);

            $this->router->run($method,$url);

        }

        public function render(){

            return $this->router->render();

        }

        /**
         * 
         * Example Names:
         * 
         * App\Controllers\Index
         * 
         * Default\Controllers\Error
         * 
         * Controller
         * 
         */

        public function loadClass($name){
            $path = $this->getClassPath($name);
            if($path == false){ throw new Exception("[PHRAME] Can't find class ".$name); }
            require_once($path);
        }

        private function getClassPath($name){
            $parts = explode("\\",strtolower($name));
            $type = $parts[0];
            
            if($type == "app")
                return $this->pathAppClass($parts);
            if($type == "phrame")
                return $this->pathPhrClass($parts);

            return $this->pathIntClass($parts);
        }

        private function pathAppClass($parts){
            array_shift($parts);
            $path = PHRAPP_PATH."/".join("/",$parts).".php";
            if(!file_exists($path)){ return false; }
            return $path;
        }

        private function pathPhrClass($parts){
            array_shift($parts);
            $path = PHRAME_PATH."default/".join("/",$parts).".php";
            if(!file_exists($path)){ return false; }
            return $path;
        }

        private function pathIntClass($parts){
            $path = PHRAME_PATH.join("/",$parts).".php";
            if(!file_exists($path)){ return false; }
            return $path;
        }

    }

?>