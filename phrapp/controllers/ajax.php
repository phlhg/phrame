<?php

    namespace App\Controllers;

    class Ajax extends \Controller {

        function Main(){
            $type = $this->arg("type");
            if($type == "json"){
                return $this->json();
            } else if($type == "xml"){
                return $this->xml();
            } else {
                return $this->reroute("Phrame/Error::http404");
            }
        }

        function json(){
            $this->view("Phrame/Output/JSON");
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

        function xml(){
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