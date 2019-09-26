<?php

    namespace Phrame\Controllers\Errors;

    class E404 extends \Controller {

        public function main(){
            http_response_code(404);
            $this->view("Phrame/Error");
            $this->view->var("code","404");
            $this->view->var("title","404 Not Found");
            $this->view->var("text","The page you were looking for could no be found.");
        }

    }

?>