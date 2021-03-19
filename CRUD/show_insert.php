<?php

session_start();

require_once ('../CRUD/show/show.php');
echo $_SESSION["user_id"];

if(isset($_SESSION["user_id"])){
$show = new show();
$show->setName($_POST['show-name']);
$show->setRating($_POST['show-rating']);
$show->setDescription($_POST['show-desc']);
$show->CreateShow($_SESSION["user_id"]);
header('Location: dashboard.php');
}



?>