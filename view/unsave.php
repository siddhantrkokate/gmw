<?php

    include("../api/connection.php");

    if(isset($_POST['contentID']) && isset($_POST['email'])){

        $contentID = $_POST['contentID'];
        $email = $_POST['email'];

        $delete = "DELETE FROM save WHERE contentID = '$contentID' AND email = '$email'";
        $queryDelete = mysqli_query($conn, $delete);

        if($queryDelete){
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