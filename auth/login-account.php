<?php
include("../api/connection.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Hash the password
    $hashed_password = $password;
    
    // Prepare select statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ? AND user_password = ?");
    $stmt->bind_param("ss", $email,$hashed_password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
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