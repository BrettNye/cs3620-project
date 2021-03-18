<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(session_status() !== PHP_SESSION_ACTIVE){
        require_once ("sessioncheck.php");
    }

    require_once ("header.php");
?>
<style>
/* The Modal (background) */
#modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
#modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 32px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.show-form{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.main-form{
    display: flex;
    flex-direction: column;

    width: 30%;
}

.main-form input, .main-form textarea{
    margin-bottom: 35px;
}

#submit-btn{
    width: 25%;
}

h2{
    color: white;
}

.title{
    width: 30%;
}

</style>

<button id="addShow" class="btn">+ Show</button>
<div id="modal">
    <div class="show-form">
        <div class="title">
            <span class="close">&times;</span>
            <h2>Add Show</h2>
            <hr>

        </div>
        <form class="main-form" action="show_insert.php" method="POST">
            <input name="show-name" type="text" placeholder="Name"/>
            <input name="show-rating" type="text" placeholder="Rating"/>
            <textarea name="show-desc" placeholder="Description"></textarea>
            <input id="submit-btn" type="submit" value="Add"/>
        </form>
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
<?php
    require_once ('../CRUD/show/show.php');

    $show = new show();
    $shows = $show->getMyShows($_SESSION['user_id']);

    $arrlength = count($shows);

    for($x = 0; $x < $arrlength; $x++){
        echo '<div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">' . $shows[$x]->getName() .'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rating: ' . $shows[$x]->getRating() . '/10</h6>
                    <p class="card-text">' . $shows[$x]->getDescription() . '</p>
                    <a href="#" class="card-link">Card Link</a>
                    <a href="#" class="card-link">Another Link</a>
                </div>
            </div>
            <br/>';
    }

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<a href="logout.php">Logout</a>