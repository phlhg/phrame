<?php

    namespace App\Controllers;

    class Ajax extends \Controller {

        function Main(){
            $this->view("Phrame/Output/XML");
            $this->view->var->set("test","lol");
            $this->view->var->set("hello","world");
            $this->view->var->set("settings",[
                [
                    "name" => "show_alert",
                    "value" => true
                ],
                [
                    "name" => "show_msg",
                    "value" => false
                ]
            ]);
        }

    }

?>