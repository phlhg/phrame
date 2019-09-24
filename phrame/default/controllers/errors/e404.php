<?php

    namespace Phrame\Controllers\Errors;

    class E404 extends \Controller {

        public function main(){
            $this->view("Phrame/Errors/e404");
        }

    }

?>