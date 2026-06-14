<?php

if(session_status() === PHP_SESSION_NONE){

    session_start();
}
 
require_once "config/database.php";
require_once "app/controllers/pageController.php";

$controller = new PageController();
$controller->handle();

?>