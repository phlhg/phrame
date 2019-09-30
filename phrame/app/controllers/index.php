<?php

    namespace App\Controllers;

    class Index extends \Controller {

        function Main(){
            $this->view("Index");
            $this->view->var->set("page_title","Welcome");
            $this->view->var->set("output",json_encode(\Helper\Upload::files()));
            if(\Helper\Upload::exists("test")){
                $files = \Helper\Upload::get("test");
                $output = "";
                foreach($files as $file){
                    $output .= "<br/><bR/>".$file->name;
                    $output .= "<br/>".$file->ext()."<br/><br/>";
                    $output .= htmlentities($file->content());
                }
                $this->view->var->set("output",$output);
            } else {
                $this->view->var->set("output","None");
            }
        }

    }

?>