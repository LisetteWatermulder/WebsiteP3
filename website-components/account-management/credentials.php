<?php

    class Database {

        public $Servername;
        public $Username;
        public $Password;
        public $Database;
        private $dbconnection;

        public function __construct($servername, $username, $password, $database) {
            $this->Servername = $servername;
            $this->Username = $username;
            $this->Password = $password;
            $this->Database = $database;
            $this->dbconnection = $this->connect();
        }

        private function connect() {
            return mysqli_connect($this->Servername, $this->Username, $this->Password);
        }

        public function createDatabaseConnection(): object {

            try {
                mysqli_select_db($this->dbconnection, $this->Database);
            } catch (mysqli_sql_exception $th) {

                /* echo "<script>console.error('Database " . '"' . $this->Servername . '"' . " not found. Please create it with the correct tables before continuing');</script>"; */
                $this->dbconnection->query("CREATE DATABASE " . $this->Database);
                $this->dbconnection->query("GRANT ALL PRIVILEGES ON " . $this->Database . ".* TO '" . $this->Username . "'@'" . $this->Servername . "' IDENTIFIED BY '" . $this->Password . "';");
                mysqli_select_db($this->dbconnection, $this->Database);

            }

            return $this->dbconnection;

        }

        public function __destruct() {
            $this->Servername = null;
            $this->Username = null;
            $this->Password = null;
            $this->Database = null;
        }

    }

    $database = new Database('localhost', 'sdegier', 'kESbWFwGLY9Dqo', 'plugplay');
    $_SESSION["dbConnection"] = $database->createDatabaseConnection();

?>