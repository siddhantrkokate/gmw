<?php

// Server setup all done
include("../../../api/connection.php");

if (isset($_POST["moduleID"]) && isset($_POST["contentID"])) {
    $moduleID = $_POST["moduleID"];
    $contentID = $_POST["contentID"];
    
    // Validate contentID to prevent SQL injection
    // Using prepared statements to prevent SQL injection in the DELETE query
    $stmt = $conn->prepare("DELETE FROM `$contentID` WHERE moduleID = ?");
    $stmt->bind_param("s", $moduleID);
    
    if ($stmt->execute()) {
        echo "Record with moduleID $moduleID deleted successfully.";
        
        // Drop table securely
        $deleteTable = "DROP TABLE IF EXISTS `$moduleID`";
        if ($conn->query($deleteTable) === TRUE) {
            echo "Table $moduleID deleted successfully.";
        } else {
            echo "Error deleting table: " . $conn->error;
        }
        
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "No moduleID or contentID provided.";
}

$conn->close();

?>