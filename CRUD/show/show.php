<?php
require_once('./show/showDAO.php');

class Show implements \JsonSerializable {
    private $show_id;
    private $name;
    private $rating;
    private $description;
    private $user_id;

    function getShowID(){
        return $this->show_id;
    }

    function getName(){
        return $this->name;
    }

    function getRating(){
        return $this->rating;
    }

    function getDescription(){
        return $this->description;
    }

    function getUserID(){
        return $this->user_id;
    }

    function setShowID($show_id){
        $this->show_id = $show_id;
    }

    function setName($name){
        $this->name = $name;
    }

    function setRating($rating){
        $this->rating = $rating;
    }

    function setDescription($description){
        $this->description = $description;
    }

    function setUserID($user_id){
        $this->user_id = $user_id;
    }

    function CreateShow($user_id){
        $showDAO = new showDAO();
        $showDAO->CreateShow($user_id, $this);
    }

    function getMyShows($user_id){
        $showDAO = new ShowDAO();
        return $showDAO->getShowsByUserID($user_id);
    }

    function DeleteMyShow($user_id, $show_id){
        $showDAO = new ShowDAO();
        $showDAO->DeleteShow($user_id, $show_id);
    }

    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}