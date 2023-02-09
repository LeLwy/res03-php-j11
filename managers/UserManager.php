<?php

    class UserManager extends AbstractManager{
        
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