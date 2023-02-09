<?php

    class UserManager extends AbstractManager{
        
        public function __construct(string $dbName, string $port, string $host, string $username, string $password){
            
            $this->dbName = $dbName /*"louischancioux_phpj11"*/;
            $this->port = $port /*"3306"*/;
            $this->host = $host /*"db.3wa.io"*/;
            $this->username = $username /*"louischancioux"*/;
            $this->password = $password /*"e1657392b3cd3a9bb9acef7eddd5a20c"*/;
        }
        
        public function index()
        {
            
            render($view, $this->manager->getAllUsers());
        }
        
        public function getAllUsers() : array
        {
            $query = $db->prepare('SELECT * FROM users');
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            
            return $users;
        }
        
        public function getUserById(int $id) : User
        {
            $query = $db->prepare('SELECT * FROM users WHERE id = :id');
            
            $parameters = [
            'id' => $id
            ];
            
            $query->execute($parameters);
            
            $user = $query->fetch(PDO::FETCH_ASSOC);
            
            return $user;
        }
        
        public function insertUser(User $user) : User
        {
            $query = $db->prepare('INSERT INTO users VALUES(:id, :email, :username, :password)');
            
            $parameters = [
            'id' => null,
            'email' => $user['email'],
            'username' => $user['username'],
            'password' => $user['password']
            ];
            
            $query->execute($parameters);
            
            $user = $query->fetch(PDO::FETCH_ASSOC);
            
            return $user;
            
        }
        
        public function editUser(User $user) : void
        {
            $query = $db->prepare('INSERT INTO users(`email`,`username`,`password`,) WHERE email = :email VALUES(:newEmail, :newUsername, :newPassword)');
            
            $parameters = [
            'email' => $user['email'],
            'newEmail' => $user['email'],
            'newUsername' => $user['username'],
            'newPassword' => $user['password']
            ];
            
            $query->execute($parameters);
            
        }
    }