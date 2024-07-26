<?php
    $sever = "127.0.0.1:3306";
    $user = "u919348121_siddhant";
    $password = "Collegeprojecthaiye12@";
    $db = "u919348121_GMW";
    
    $conn = mysqli_connect($server,$user,$password,$db);
    
    if(!$conn){
        echo "Connection not established!";
    }
?>