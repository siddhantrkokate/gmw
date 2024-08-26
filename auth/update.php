<?php
    include("../api/connection.php");

if(isset($_POST["email"]) && isset($_POST["newPass"])) {
    $email = $_POST["email"];
    $newPassword = $_POST["newPass"];

    // Validate inputs if necessary
    // Hash the new password
    // $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

    // Prepare update statement
    $stmt = mysqli_prepare($conn, "UPDATE users SET user_password = ? WHERE user_email = ?");
    mysqli_stmt_bind_param($stmt, "ss", $newPassword, $email);

    if(mysqli_stmt_execute($stmt)) {
        echo "pass"; // Password updated successfully
    } else {
        echo "fail"; // Error occurred during password update
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "fail"; // If email or new password are not set in POST data
}
?>