<?php
    // Set the default time zone to Indian Standard Time (IST)
    date_default_timezone_set('Asia/Kolkata');
    
    $server = "localhost";
    $user = "root";
    $password = "demohaiye12@";
    $db = "gmw";
    
    $conn = mysqli_connect($server, $user, $password, $db);
    
    if (!$conn) {
        die("Connection not established!");
    }
?>