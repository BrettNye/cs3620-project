<?php
    require_once ('header.php');
    if(isset($_GET['error'])){
        echo "<p id='error'>Login Failed<br>Username or Password was Incorrect</p>";
    }
    require_once ('login.html');
    require_once ('footer.php');
?>