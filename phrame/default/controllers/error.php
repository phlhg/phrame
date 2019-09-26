<?php

    namespace Phrame\Controllers;

    class Error extends \Controller {

        public function main(){
            $code = $this->arg("code");
            switch($code){
                case 400:
                    $this->http400();
                    break;
                case 401:
                    $this->http401();
                    break;
                case 403:
                    $this->http403();
                    break;
                case 404:
                    $this->http404();
                    break;
                case 500:
                    $this->http500();
                    break;
                default:
                    $this->http404();
                    break;
            }
        }

        public function http400(){
            http_response_code(400);
            $this->view("Phrame/Error");
            $this->view->var("code","400");
            $this->view->var("title","400 Bad Request");
            $this->view->var("text","The server can't process the request, due to an error in the request.<br/> Try updating your browser or try it again later.");
        }

        public function http401(){
            http_response_code(401);
            $this->view("Phrame/Error");
            $this->view->var("code","401");
            $this->view->var("title","401 Unauthorized");
            $this->view->var("text","You need to be authenticated to view this page.");
        }

        public function http403(){
            http_response_code(403);
            $this->view("Phrame/Error");
            $this->view->var("code","403");
            $this->view->var("title","403 Forbidden");
            $this->view->var("text","This page can't be accessed.");
        }

        public function http404(){
            http_response_code(404);
            $this->view("Phrame/Error");
            $this->view->var("code","404");
            $this->view->var("title","404 Not Found");
            $this->view->var("text","The page you were looking for could no be found.");
        }

        public function http500(){
            http_response_code(500);
            $this->view("Phrame/Error");
            $this->view->var("code","500");
            $this->view->var("title","500 Internal Server Error");
            $this->view->var("text","The server is not able to process this request - Please try again later.");
        }

    }

?>