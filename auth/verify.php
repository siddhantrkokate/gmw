<?php
// Include database connection
include("../api/connection.php");

if (isset($_POST["email"]) && isset($_POST["code"])) {
    $email = $_POST["email"];
    $code = $_POST["code"];
    
    $select = "SELECT * FROM reset WHERE email='$email' AND code='$code'";
    $query = mysqli_query($conn, $select);
    
    if(!$query){
        echo "fail";
    }
    
    if($query->num_rows > 0){
        echo "pass";
        exit();
    }else {
        echo "fail";
        exit();
    }
    
} else {
    echo "Email and password are required";
}
?>