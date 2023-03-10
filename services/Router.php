<?php

    require 'controllers/UserController.php';

    class Router{
        
        private UserController $uc;
        
        public function __conctruct(){
            
            $this->uc = new UserController();
        }
    
        public function getUc() : UserController
        {
            return $this->uc;
        }
    
        public function setUc(int $uc) : void
        {
            $this->uc = $uc;
        }
        
        public function checkroute(string $route) : void 
        {
            if($route === "users"){
                
                $this->uc->index();
                
            }else if($route === "user-create"){
                
                $this->uc->create();
                
            }else if($route === "user-edit"){
                
                $this->uc->edit();
                
            }else{
                
                $this->uc->index();
                
            }
        }
    }