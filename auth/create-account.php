<?php
include("../api/connection.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Hash the password
    $hashed_password = $password;
    
    // Prepare select statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "User found";
        exit();
    }

    // Prepare insert statement
    $stmt = $conn->prepare("INSERT INTO users (user_email, user_password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashed_password);
    
    if ($stmt->execute()) {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        echo "pass";
    } else {
        echo "fail";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Email and password are required";
}
?>