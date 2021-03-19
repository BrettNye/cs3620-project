<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('./show/show.php');

$show = new Show();
$show->DeleteMyShow($_SESSION["user_id"], $_GET['show_id']);
echo $_GET['show_id'];
header('Location: dashboard.php');

?>