<?php

    namespace App\Controllers\Args;

    class Index extends \Controller {

        public function Main(){
            $this->view("Args/Index");
            $this->view->var->set("page_title",htmlentities($this->arg("name")));
            $this->view->var->set("name",htmlentities($this->arg("name")));
            $this->view->var->set("id",htmlentities($this->arg("id")));
        }

    }

?>