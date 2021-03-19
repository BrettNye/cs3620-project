<?php
    require_once ('header.php');
    if(isset($_GET['error'])){
        echo "<p id='error'>Login Failed<br>Username or Password was Incorrect</p>";
    }
?>
<div id="login-body">
    <?php
        require_once ('login.html');
    ?>
</div>
<?php
    require_once ('footer.php');
?>