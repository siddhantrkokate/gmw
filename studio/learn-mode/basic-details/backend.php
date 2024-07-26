<?php
    include("../../../api/connection.php");
    
    if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST["status"]) && isset($_POST['contentID'])){
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $contentID = $_POST['contentID'];
        
        $update = "UPDATE `learnMode` SET `title`='$title', `description`='$description', `status`='$status' WHERE contentID='$contentID'";
        $query = mysqli_query($conn, $update);
        
        if(!$query){
            echo 00;
        }else{
            echo 10;
        }
        
    }
?>