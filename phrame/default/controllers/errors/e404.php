<?php

    namespace App\Controllers\Errors;

    class E404 extends \Controller {

        public function main(){
            $this->view("Errors/e404");
        }

    }

?>