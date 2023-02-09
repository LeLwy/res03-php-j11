<?php

    abstract class AbstractManager{
        
        protected PDO $db;
        private string $dbName;
        private string $port;
        private string $host;
        private string $username;
        private string $password;
        
        public function __construct(string $dbName, string $port, string $host, string $username, string $password){
            
            $this->dbName = $dbName /*"louischancioux_phpj11"*/;
            $this->port = $port /*"3306"*/;
            $this->host = $host /*"db.3wa.io"*/;
            $this->username = $username /*"louischancioux"*/;
            $this->password = $password /*"e1657392b3cd3a9bb9acef7eddd5a20c"*/;
            $this->db = new PDO(
                            "mysql:host=$host;port=$port;dbname=$dbName",
                            $username,
                            $password
                        );
        }
        
        
    }
    