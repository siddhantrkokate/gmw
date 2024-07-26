<?php

// Server setup all done
include("../../api/connection.php");

if(isset($_POST["contentID"])){
    $contentID = $_POST["contentID"];
    
    // Validate the contentID to prevent SQL injection
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM `learnMode` WHERE contentID=?");
        $stmt->bind_param("s", $contentID);
        
        if($stmt->execute()){
            echo "Record with contentID $contentID deleted successfully.";
            
            // Drop table securely
            $deleteTable = "DROP TABLE IF EXISTS `$contentID`";
            if ($conn->query($deleteTable) === TRUE) {
                echo "Table $contentID deleted successfully.";
            } else {
                echo "Error deleting table: " . $conn->error;
            }
            
            $d10 = "DELETE FROM `unified` WHERE contentID='$contentID'";
            $q10 = mysqli_query($conn, $d10);
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
        
        $stmt->close();
    
} else {
    echo "No contentID provided.";
}

$conn->close();

?>
