<?php

    namespace App\Models\SQL;

    class Articles extends \SQLModel {

        public static function get($id){

            return Self::query(
                "SELECT id, title, content, UNIX_TIMESTAMP(date) as date FROM articles where id = ? LIMIT 1",
                [$id]
            )->fetch(\PDO::FETCH_OBJ);
            
        }

        public static function getAll(){
            
            return Self::query(
                "SELECT id FROM articles"
            )->fetchAll(\PDO::FETCH_COLUMN);
        }

    }

?>