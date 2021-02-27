<?php
    session_start();

    require_once('./user/user.php');

    $user = new user();
    $user->getUser($_GET["id"]);

    echo json_encode($user);
?>