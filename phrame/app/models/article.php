<?php

    namespace App\Models;

    class Article extends \Model {

        private static $data = [[
            "title" => "Hello World",
            "content" => "Well, hello there."
        ],[
            "title" => "WOW",
            "content" => "Wooooooooooooooooooooooooow"
        ]];

        public $id = -1;
        public $title = "";
        public $content = "";

        public function __construct($id){
            $this->load(intval($id));
        }

        private function load($id){
            if(!isset(Self::$data[$id])){ return; }
            $this->id = $id;
            $this->title = Self::$data[$id]["title"];
            $this->content = Self::$data[$id]["content"];
        }
    }

?>