<?php

    namespace App\Controllers;

    class Index extends \Controller {

        function Main(){
            $this->view("Index");
            $this->var->set("page_title","Welcome");
        }

    }

?>