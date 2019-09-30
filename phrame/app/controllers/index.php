<?php

    namespace App\Controllers;

    class Index extends \Controller {

        function Main(){
            $this->view("Index");
            $this->view->var->set("page_title","Welcome");
            if(\Helper\Upload::exists("test")){
                $files = \Helper\Upload::get("test");
                if($files->exists(0)){
                    $this->view->var->set("output",file_get_contents($files->get(0)->tmp_name));
                } else {
                    $this->view->var->set("output","None");
                }
            } else {
                $this->view->var->set("output","None");
            }
        }

    }

?>