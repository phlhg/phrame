<?php

    namespace Phrame\Controllers\Errors;

    class E404 extends \Controller {

        public function main(){
            http_response_code(404);
            $this->view("Phrame/Errors/e404");
        }

    }

?>