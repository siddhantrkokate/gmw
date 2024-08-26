<?php

include("../../api/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Directory where you want to save the uploaded files
    $uploadDirectory = '../../pdf/';

    // Check if the directory exists, if not create it
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }
    
    $title = $_POST["title"];
    $description = $_POST["description"];
    $file = $_FILES['pdf'];
    
    // Define the target path for the file
    $targetFilePath = $uploadDirectory . basename($file['name']);
    
    $video = $_POST["video"];
    $status = $_POST['status'];
    
    $time = $_POST['time'];
    $date = $_POST['date'];
    
    $userID = 0;
    session_start();
    // Check if the user is logged in
    if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
        $select = "SELECT * FROM users WHERE user_email = ? AND user_password = ?";
        $stmt = $conn->prepare($select);
        $stmt->bind_param("ss", $_SESSION["email"], $_SESSION["password"]);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if($result->num_rows > 0){
            $fetch = $result->fetch_assoc();
            $userID = $fetch["user_id"];
            // You can now use $userID
        }
    }
    
    if($date==""){
        $currentDate = date('Y-m-d');
        $date = $currentDate;
    }

    
    function generateModuleId($title, $description, $contentId) {
      // Create a hash using the three inputs
      $hash = hash('sha256', $title . $description . $contentId);
    
      // Take the first 8 characters of the hash (you can adjust this length to your needs)
      $moduleId = substr($hash, 0, 8);
        $moduleId .= '-' . rand(1000, 9999);
    
      return $moduleId;
    }    
    
    $contentID = generateModuleId($title, $description, $userID);
    
    $newFileName = $contentID . '.pdf';
    
    // Move the uploaded file to the target directory
    if(move_uploaded_file($file['tmp_name'], $uploadDirectory . $newFileName)){
        $insert = "INSERT INTO `quickRead`(`contentID`, `userID`, `title`, `description`, `pdf`, `video`, `time`, `date`, `status`, `contentLike`, `contentViews`) VALUES ('$contentID','$userID','$title','$description','$newFileName','$video','$time','$date','$status',0,0)";
        
        // Execute the insert query
        if($conn->query($insert) === TRUE){
            echo "New record created successfully";
            $insertUnified = "INSERT INTO `unified`(`id`, `contentID`, `type`) VALUES (null,'$contentID','quick')";
            $queryUnified = mysqli_query($conn, $insertUnified);
        } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file";
    }
}

?>