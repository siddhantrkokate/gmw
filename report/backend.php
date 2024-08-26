<?php
    
    include("../api/connection.php");
                    
    if(isset($_POST['contentID']) && isset($_POST['email']) && isset($_POST['complaint']) && isset($_POST['message'])){
        
        $contentID = $_POST['contentID'];
        $email = $_POST['email'];
        $complaint = $_POST['complaint'];
        $message = $_POST['message'];
        
        $insert = "INSERT INTO `report`(`reportID`, `contentID`, `email`, `complaint`, `message`) VALUES (null,'$contentID','$email','$complaint','$message')";
        $queryInsert = mysqli_query($conn, $insert);
        
        if($queryInsert){
            echo 10;
            exit();
        }else{
            echo 20;
            exit();
        }
        
    }
    
?>