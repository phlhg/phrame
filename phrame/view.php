<?php

    class View {

        private $content = "";
        private $name = "";

        public function __construct($name){
            $this->name = $name;
            $this->load();
        }

        private function load(){
            $content = "";
            ob_start();
                require dirname(__FILE__)."/default/views/".$this->name.".php";
                $this->content = ob_get_contents();
            ob_end_clean();
        }

        public function render(){
            return $this->content;
        }

    }

?>