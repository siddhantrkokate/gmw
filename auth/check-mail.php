<?php
include("../api/connection.php");

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    
    // Prepare select statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "pass";
        exit();
    }else{
        echo "User not found";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Email and password are required";
}
?>