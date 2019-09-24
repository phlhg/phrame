<?php

    namespace App\Controllers\Args;

    class Index extends \Controller {

        public function Main(){
            $this->view("Args/Index");
            $this->view->var("name",htmlentities($this->arg("name")));
            $this->view->var("id",htmlentities($this->arg("id")));
        }

    }

?>