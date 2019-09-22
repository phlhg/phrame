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
            
            $this->router = new Router($this);

        }

        public function run($url=false){

            $url = ( !$url ? parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) : $url);
            $this->router->run($url);

        }

        public function render(){
            return $this->router->render();
        }

    }

?>