<?php

    namespace Phrame\Controllers;

    class NoRoutes extends \Controller {

        public function main(){
            $this->view("Phrame/NoRoutes");
            $this->var->set("page_title","No Routes");
        }

    }

?>