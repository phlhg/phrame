<?php

    namespace App\Controllers\Articles;

    class Show extends \Controller {

        public function Main(){
            $name = $this->arg("name");
            $id = $this->arg("id");
            $article = new \App\Models\Article($id);
            if($article->id < 0){ $this->reroute("phrame/error::http404"); return; }
            if(str_replace(" ","-",strtolower($article->title)) != $name){
                $this->arg("name",str_replace(" ","-",strtolower($article->title)));
                return $this->refresh();
            }
            $this->view("Articles/Show");
            $this->var->set("page_title",$article->title);
            $this->var->set("title",$article->title);
            $this->var->set("date",$article->date);
            $this->var->set("content",$article->content);
        }

    }

?>