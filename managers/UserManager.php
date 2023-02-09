<?php

    require 'AbstractManager.php';
    require 'models/User.php';

    class UserManager extends AbstractManager{
        
        public function __construct(string $dbName, string $port, string $host, string $username, string $password){
            
            $this->dbName = $dbName;
            $this->port = $port;
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
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
            
            $newUser = new User($user['email'], $user['username'], $user['password']);
            $newUser->setId($user['id']);
            
            return $newUser;
        }
        
        public function insertUser(User $user) : User
        {
            $query = $db->prepare('INSERT INTO users VALUES(:id, :email, :username, :password)');
            
            $parameters = [
            'id' => null,
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword()
            ];
            
            $query->execute($parameters);
            
            $id = $this->db->LastInsertId();
            $user->setId($id);
            
        }
        
        public function editUser(User $user) : void
        {
            $query = $db->prepare('UPDATE users SET email = :newEmail, username = :newUsername, password = :newPassword WHERE id = :id');
            
            $parameters = [
            'id' => $user->getId(),
            'newEmail' => $user->getEmail(),
            'newUsername' => $user->getUsername(),
            'newPassword' => $user->getPassword()
            ];
            
            $query->execute($parameters);
            
        }
    }