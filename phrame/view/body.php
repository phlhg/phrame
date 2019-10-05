<?php

    namespace View;

    class Body {

        private $view;
        private $rendering = false;

        public $content = "";

        public function __construct($view){
            $this->view = $view;
        }

        public function load(){
            $this->content = "";
            ob_start();
                $this->rendering = true;
                    $_VIEW = $this->view;
                    $_VAR = $this->view->var;
                    $_HEADER = $this->view->header;
                    require(Self::getFile($this->view->name));
                $this->content = ob_get_contents();
                $this->rendering = false;
            ob_end_clean();
        }

        public function add($view){
            $_VIEW = $this->view;
            $_VAR = $this->view->var;
            $_HEADER = $this->view->header;
            if($this->rendering)
                require(Self::getFile($view));
        }

        public static function getFile($name){
            $parts = explode("/",strtolower($name));
            $file = "";
            if($parts[0] == "phrame"){ array_shift($parts); $file .= PHRAME_PATH."default/"; } else { $file .= PHRAPP_PATH; }
            $file .= "views/".join("/",$parts).".php";
            return $file;
        }

    }

?>