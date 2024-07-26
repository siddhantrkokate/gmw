<?php
session_start(); // Start session

// Clear all session variables
$_SESSION = [];

// Delete session cookie if it exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy(); // Destroy session

header("Location: ../home/"); // Redirect to home page
exit; // Exit script
?>