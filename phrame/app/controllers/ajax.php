<?php

    namespace App\Controllers;

    class Ajax extends \Controller {

        function Main(){
            $this->view("Phrame/json");
            $this->view->var->set("test","lol");
            $this->view->var->set("hello","world");
        }

    }

?>