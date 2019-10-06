<?php

    namespace Phrame\Controllers;

    class NoApp extends \Controller {

        public function main(){
            $this->view("Phrame/NoApp");
            $this->var->set("page_title","No App");
        }

    }

?>