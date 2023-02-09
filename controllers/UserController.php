<?php

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
            
            render("index", ["users"=>$this->manager->getAllUsers()]);
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