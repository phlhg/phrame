<?php

    class DBM {

        private static $databases = [];
        private static $main;

        public static function init(){
            Self::load();
        }

        public static function add($identifier,$host,$dbname,$credentials){
            if(count(Self::$databases) < 1){ Self::$main = $identifier; }
            Self::$databases[$identifier] = new DB($host,$dbname,$credentials);
            return Self::$databases[$identifier];
        }

        public static function exists($identifier){
            return isset(Self::$databases[$identifier]);
        }

        public static function get($identifier=NULL){
            if(!isset($identifier)){ return Self::getMain(); }
            if(!Self::exists($identifier)){ return false; }
            return Self::$databases[$identifier];   
        }

        public static function getMain(){
            if(!isset(Self::$main)){ return false; }
            return Self::$databases[Self::$main];
        }

        private static function load(){
            if(!file_exists(dirname(__FILE__)."/app/db.php")){ return; }
            require_once(dirname(__FILE__)."/app/db.php");
        }

    }

    class DB {

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

        public function connection(){
            return $this->connection;
        }

        private function connect(){
            $this->connection = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->username,$this->password);
        }

    }

?>