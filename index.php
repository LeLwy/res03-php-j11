<?php

session_start();

/********** ROUTING **********/
        
require 'services/Router.php';

$newRouter = new Router();

if (isset ($_GET["route"])){
    
    $newRouter->checkRoute($_GET["route"]);
}