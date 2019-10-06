<?php

    namespace App\Controllers;

    class Ajax extends \Controller {

        function Main(){
            $this->view("Phrame/Output/XML");
            $this->var->set("test","lol");
            $this->var->set("hello","world");
            $this->var->set("settings",[
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