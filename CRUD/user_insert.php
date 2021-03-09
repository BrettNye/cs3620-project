<?php

session_start();

require_once('./user/user.php');

if($user->getUserByUsername() == "0"){

$user = new user();
$user->setUsername($_POST["username"]);
$user->setFirstName($_POST["firstName"]);
$user->setLastName($_POST["lastName"]);
$user->setPassword($_POST["password"]);
$user->createUser(); 
} else{
    
}

?>