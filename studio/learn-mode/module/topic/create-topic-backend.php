<?php

include("../../../../api/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Directory where you want to save the uploaded files
    $uploadDirectory = '../../../../pdf/';
    
    $topicName = $_POST["topicName"];
    $video = $_POST["video"];
    $file = $_FILES['pdf'];
    $moduleID = $_POST["moduleID"];
    
    // Define the target path for the file
    $targetFilePath = $uploadDirectory . basename($file['name']);
    
    function generateModuleId($title, $moduleID) {
        // Create a hash using the two inputs
        $hash = hash('sha256', $title . $moduleID);
        
        // Take the first 8 characters of the hash (you can adjust this length to your needs)
        $moduleId = substr($hash, 0, 8);
        $moduleId .= '-' . rand(1000, 9999);
        
        return $moduleId;
    }    
    
    $topicID = generateModuleId($topicName, $moduleID);
    
    $newFileName = $topicID . '.pdf';
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($file['tmp_name'], $uploadDirectory . $newFileName)) {
        $insert = "INSERT INTO `$moduleID` (`topicID`, `topicName`, `pdf`, `video`) VALUES ('$topicID','$topicName','$newFileName','$video')";
        
        // Execute the insert query
        if ($conn->query($insert) === TRUE) {
            echo 10;
        } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
} else {
    echo "Invalid request method.";
}
?>