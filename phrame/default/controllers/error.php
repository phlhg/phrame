<?php

    namespace Default\Controllers;

    class Error extends \Controller {

        public function main(){
            $code = intval($this->arg("code"));
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
                    $this->http500();
                    break;
            }
        }

        public function http400(){
            $this->view("Phrame/Error");
            $this->view->header->status(400);

            $this->view->var->set("page_title","400");
            $this->view->var->set("title","400 Bad Request");
            $this->view->var->set("text","The server can't process the request, due to an error in the request.<br/> Try updating your browser or try it again later.");
        }

        public function http401(){
            $this->view("Phrame/Error");
            $this->view->header->status(401);

            $this->view->var->set("page_title","401");
            $this->view->var->set("title","401 Unauthorized");
            $this->view->var->set("text","You need to be authenticated to view this page.");
        }

        public function http403(){
            $this->view("Phrame/Error");
            $this->view->header->status(403);

            $this->view->var->set("page_title","403");
            $this->view->var->set("title","403 Forbidden");
            $this->view->var->set("text","This page can't be accessed.");
        }

        public function http404(){
            $this->view("Phrame/Error");
            $this->view->header->status(404);

            $this->view->var->set("page_title","404");
            $this->view->var->set("title","404 Not Found");
            $this->view->var->set("text","The page you were looking for could no be found.");
        }

        public function http500(){
            $this->view("Phrame/Error");
            $this->view->header->status(500);

            $this->view->var->set("page_title","500");
            $this->view->var->set("title","500 Internal Server Error");
            $this->view->var->set("text","The server is not able to process this request - Please try again later.");
        }

    }

?>