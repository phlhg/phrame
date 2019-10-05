<?php

    namespace App\Controllers\Articles;

    class Index extends \Controller {

        public function Main(){
            $this->view("Articles/Index");
            $this->view->var->set("page_title","Articles");
            $this->view->var->set("articles",\App\Models\Article::getAll());
        }

    }

?>