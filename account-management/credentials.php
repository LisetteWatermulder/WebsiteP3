<?php

    class Database {

        public $Servername;
        public $Username;
        public $Password;
        public $Database;

        public function __construct($servername, $username, $password, $database) {
            $this->Servername = $servername;
            $this->Username = $username;
            $this->Password = $password;
            $this->Database = $database;
        }

        public function connect() {

            $connection = new PDO("mysql:host=$this->Servername;dbname=$this->Database", $this->Username, $this->Password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;

        }

        public function __destruct() {
            $this->Servername = null;
            $this->Username = null;
            $this->Password = null;
            $this->Database = null;
        }

    }

?>