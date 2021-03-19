<?php

class ShowDAO{

    function getShowID($show){
        require_once ('./utilities/connection.php');
        $sql = "SELECT show_id FROM shows WHERE Title = '" . $show->getName() . "'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $show_id = $row["show_id"];
            }
          }
        $conn->close();
        return $show_id;
    }

    function getShowsByUserID($userid){
      require_once ('./utilities/connection.php');
      require_once ('./show/show.php');

      $sql = "SELECT show_id, Title, Rating, Description, user_id FROM shows WHERE user_id = '" . $userid ."'";
      $result = $conn->query($sql);

      $shows;
      $index = 0;

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $show = new show();

          $show->setShowID($row['show_id']);
          $show->setName($row['Title']);
          $show->setRating($row['Rating']);
          $show->setDescription($row['Description']);
          $show->setUserID($row['user_id']);
          $shows[$index] = $show;
          $index++;
        }
      }
      $conn->close();

      return $shows;
    }

    function CreateShow($user_id, $show){
        require_once ('./utilities/connection.php');

        $sql = "INSERT INTO cs3620_proj.shows (Title, Rating, Description, user_id)
                VALUES
                ('" . $show->getName() . "',
                '" . $show->getRating() . "',
                '" . $show->getDescription() . "',
                " . $user_id . ")";

        if ($conn->query($sql) === TRUE) {
          echo "Show created";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function DeleteShow($userid, $showid){
      require_once ('./utilities/connection.php');

      $sql = "DELETE FROM shows WHERE user_id = " . $userid . " AND show_id = " . $showid;

      if ($conn->query($sql) === TRUE) {
        echo "show deleted";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      $conn->close();
    }
    

}

?> 