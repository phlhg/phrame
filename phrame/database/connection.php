<?php

    namespace Database;

    class Connection {

        private $host = "";
        private $username = "";
        private $password = "";
        private $dbname = "";
        private $charset = "utf8";
        private $connection;

        public function __construct($host,$dbname,$credentials,$charset="utf8"){
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $credentials[0];
            $this->password = $credentials[1];
            $this->charset = $charset;
            $this->connect();
        }

        public function get(){
            return $this->connection;
        }

        private function connect(){
            $this->connection = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbname.";charset=".$this->charset,$this->username,$this->password);
        }

        public static function add(...$args){
            return Manager::add(...$args);
        }

    }

?>