<?php

    namespace App\Controllers\Args;

    class Index extends \Controller {

        public function Main(){
            $name = $this->arg("name");
            echo "Name: ".$name;
            $this->view("index");
        }

    }

?>