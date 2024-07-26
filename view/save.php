<?php

    include("../api/connection.php");

    if(isset($_POST['contentID']) && isset($_POST['email'])){

        $contentID = $_POST['contentID'];
        $email = $_POST['email'];

        $insert = "INSERT INTO save (contentID, email) VALUES ('$contentID', '$email')";
        $queryInsert = mysqli_query($conn, $insert);

        if($queryInsert){
            echo 10;
            exit();
        }else{
            echo mysqli_error($conn); // print the error message
            echo 20;
            exit();
        }

    } else {
        echo "Invalid request";
        exit();
    }

?>