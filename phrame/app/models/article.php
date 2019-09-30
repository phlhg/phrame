<?php

    namespace App\Models;

    class Article extends \Model {

        public $id = -1;
        public $title;
        public $date = 0;
        public $content;

        public function __construct($id){
            $this->load($id);
        }

        private function load($id){
            $id = intval($id);
            $data = SQL\Articles::get($id);
            if(!$data){ return; }
            $this->id = $id;
            $this->title = $data->title;
            $this->date = $data->date;
            $this->content = $data->content;
        }

        public static function getAll(){

            foreach(SQL\Articles::getAll() as $id){
                yield new Self($id);
            }

        }
    }

?>