<?php

    namespace App\Controllers\Articles;

    class Index extends \Controller {

        public function Main(){
            $this->view("Articles/Index");
            $this->var->set("page_title","Articles");
            $this->var->set("articles",\App\Models\Article::getAll());
        }

    }

?>