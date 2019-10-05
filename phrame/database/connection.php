<?php

    namespace Database;

    class Connection {

        private $host = "";
        private $username = "";
        private $password = "";
        private $dbname = "";
        private $connection;

        public function __construct($host,$dbname,$credentials){
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $credentials[0];
            $this->password = $credentials[1];
            $this->connect();
        }

        public function get(){
            return $this->connection;
        }

        private function connect(){
            $this->connection = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->username,$this->password);
        }

        public static function add(...$args){
            return Manager::add(...$args);
        }

    }

?>