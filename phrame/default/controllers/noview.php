<?php

    namespace Phrame\Controllers;

    class NoView extends \Controller {

        public function main(){
            $this->view("Phrame/NoView");
            $this->var->set("page_title","No View");
        }

    }

?>