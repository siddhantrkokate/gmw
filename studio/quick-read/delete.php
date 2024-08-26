<?php

// Server setup all done
include("../../api/connection.php");

if(isset($_POST["contentID"])){
    $contentID = $_POST["contentID"];
    
    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM `quickRead` WHERE contentID=?");
    $stmt->bind_param("s", $contentID);
    
    if($stmt->execute()){
        echo "Record with contentID $contentID deleted successfully.";
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