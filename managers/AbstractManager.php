<?php

    abstract class AbstractManager{
        
        protected PDO $db;
        protected string $dbName;
        protected string $port;
        protected string $host;
        protected string $username;
        protected string $password;
        
        
        
        private function initDb() : PDO
        {
            $this->db = new PDO(
                            "mysql:host=$this->host;port=$this->port;dbname=$this->dbName",
                            $this->username,
                            $this->password
                        );
        }
    }
    