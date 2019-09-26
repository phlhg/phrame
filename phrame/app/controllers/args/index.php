<?php

    namespace App\Controllers\Args;

    class Index extends \Controller {

        public function Main(){
            $name = $this->arg("name");
            $id = $this->arg("id");
            $article = new \App\Models\Article($id);
            if($article->id < 0){ $this->reroute("phrame/error::http404"); return; }

            $this->view("Args/Index");
            $this->view->var->set("page_title",$article->title);
            $this->view->var->set("title",$article->title);
            $this->view->var->set("content",$article->content);
        }

    }

?>