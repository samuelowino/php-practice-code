<?php
    class DatabaseConnection {
        private $database_name;
        private $host;
        private $url;
        private $username;
        private $password;

        public function __construct($database_name, $host, $url,$username,$password){
            $this->database_name = $database_name;
            $this->host = $host;
            $this->url = $url;
            $this->username = $username;
            $this->password->password = $password;
        }

    
    }

?>