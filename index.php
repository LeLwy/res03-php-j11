<?php

session_start();

/********** ROUTING **********/
        
require 'services/Router.php';

$router = new Router();

if (isset ($_GET["route"])){
    
    $newRouter->checkRoute($_GET["route"]);
}
else{
    $newRouter->checkRoute("");
}