<?php

    include("../api/connection.php");

    if(isset($_POST['contentID']) && isset($_POST['email'])){

        $contentID = $_POST['contentID'];
        $email = $_POST['email'];

        $selectLikes = "select * from save WHERE contentID='$contentID' AND email='$email'";
        $queryLikes = mysqli_query($conn, $selectLikes);

        if(mysqli_num_rows($queryLikes)){
            echo 20;
            exit();
        }else{
            echo 10;
            exit();
        }

    }

?>