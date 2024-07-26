<?php

// Server setup all done
include("../../../../api/connection.php");

if (isset($_POST["moduleID"]) && isset($_POST["topicID"])) {
    $moduleID = $_POST["moduleID"];
    $topicID = $_POST["topicID"];
    
    // Validate contentID to prevent SQL injection
    // Using prepared statements to prevent SQL injection in the DELETE query
    $stmt = $conn->prepare("DELETE FROM `$moduleID` WHERE topicID = ?");
    $stmt->bind_param("s", $topicID);
    
    if ($stmt->execute()) {
        echo "Record with moduleID $topicID deleted successfully.";
        
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "No moduleID or contentID provided.";
}

$conn->close();

?>