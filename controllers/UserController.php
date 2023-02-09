<?php

    require 'AbstractController.php';
    require 'managers/UserManager.php';

    class UserController extends AbstractController{
        
        private UserManager $manager;
        
        public function __construct(){
            
            $this->manager = $manager;
        }
    
        public function getManager() : UserManager
        {
            return $this->manager;
        }
    
        public function setManager(UserManager $manager) : void
        {
            $this->manager = $manager;
        }
        
        public function index()
        {
            $this->manager = new UserManager('louischancioux_phpj11','3306','db.3wa.io','louischancioux','e1657392b3cd3a9bb9acef7eddd5a20c');
            $this->manager->initDb();
            $users = $this->manager->getAllUsers();
            $this.render("index", ['users' => $users]);
        }
        
        public function create(array $post)
        {
            $user = new User($post['email'], $post['username'], $post['password']);
            $this->manager-> insertUser($user);
            render("create", ["user"=>$this->manager->insertUser($user)]);
        }
        
        public function edit(array $post)
        {
            $user = new User($post['email'], $post['username'], $post['password']);
            $this->manager-> editUser($user);
            render("edit", ["user"=>$user]);
        }
    }