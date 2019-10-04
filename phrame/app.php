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
        private $apppath;
        private $phrpath;

        function __construct($path){

            $this->apppath = $path;
            $this->phrpath = __DIR__;

            spl_autoload_register(function($name){
                return $this->loadClass($name);
            });

            DBM::init();
            Conf::init();

            $this->router = new Router($this);

        }

        public function run($url=false){

            $url = ( !$url ? parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) : $url);
            $this->router->run($url);

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
            if($type == "default")
                return $this->pathDefClass($parts);

            return $this->pathIntClass($parts);
        }

        private function pathAppClass($parts){
            $parts = array_shift($parts);
            $path = $this->apppath."/".join("/",$parts).".php";
            if(!file_exists($path)){ return false; }
            return $path;
        }

        private function pathDefClass($parts){
            $parts = array_shift($parts);
            $path = $this->phrpath."/default/".join("/",$parts).".php";
            if(!file_exists($path)){ return false; }
            return $path;
        }

        private function pathIntClass($parts){
            $path = $this->phrpath."/".join("/",$parts).".php";
            if(!file_exists($path)){ return false; }
            return $path;
        }

    }

?>