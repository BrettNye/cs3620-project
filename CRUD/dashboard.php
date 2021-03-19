<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(session_status() !== PHP_SESSION_ACTIVE){
        require_once ("sessioncheck.php");
    }

    require_once ('header.php');
?>
<style><?php include ('../CRUD/CSS/main.css')?> </style>
<div id="page" class="d-flex justify-content-center flex-column">
    <div class="d-flex justify-content-end w-100">
        <button id="addShow" class="btn btn-outline-dark mt-4 mb-4">Add Show</button>
    </div>
<div id="modal">
    <div class="show-form">
        <div class="title">
            <span class="close">&times;</span>
            <h2>Add Show</h2>
            <hr>

        </div>
        <form class="main-form" action="show_insert.php" method="POST">
            <input name="show-name" type="text" placeholder="Name" required/>
            <input name="show-rating" type="number" min="0" max="10" placeholder="Rating (1-10)" required/>
            <textarea name="show-desc" placeholder="Description" required></textarea>
            <input id="submit-btn" type="submit" value="Add"/>
        </form>
    </div>
</div>
<div class="list d-flex flex-wrap">
<?php
    require_once ('../CRUD/show/show.php');

    $show = new show();
    $shows = $show->getMyShows($_SESSION['user_id']);

    $arrlength = count($shows);

    for($x = 0; $x < $arrlength; $x++){
        echo '<div class="card m-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">' . $shows[$x]->getName() .'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rating: ' . $shows[$x]->getRating() . '/10</h6>
                    <p class="card-text">' . $shows[$x]->getDescription() . '</p>
                    <a href="show_delete.php?show_id=' . $shows[$x]->getShowID() . '" class="card-link">Delete</a>
                </div>
            </div>
            <br/>';
    }

?>
</div>
</div>


<script>
    var modal = document.getElementById("modal");
    var btn = document.getElementById("addShow");
    var span = document.getElementsByClassName("close")[0];


    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php
    require_once ('./footer.php')
?>