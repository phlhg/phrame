<?php

    namespace App\Controllers;

    class Index extends \Controller {

        function Main(){
            $this->view("Index");
            $this->view->var->set("page_title","Welcome");
        }

    }

?>