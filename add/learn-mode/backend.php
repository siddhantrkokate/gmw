<?php
    
    include("../../api/connection.php");
    
    if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["status"]) && isset($_POST["time"]) && isset($_POST["date"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        
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
        
        $insert = "INSERT INTO `learnMode`(`contentID`, `userID`, `title`, `description`, `time`, `date`, `contentLike`, `contentViews`, `status`) VALUES ('$contentID','$userID','$title','$description','$time','$date',0,0,'$status')";
        
        // Execute the insert query
        if($conn->query($insert) === TRUE){
            echo "New record created successfully";
            $table_name = $contentID;
            $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
              `moduleID` text NOT NULL,
              `moduleName` varchar(255) NOT NULL
            )";
            
            if ($conn->query($sql) === TRUE) {
                echo "Table $table_name created successfully";
                $insertUnified = "INSERT INTO `unified`(`id`, `contentID`, `type`) VALUES (null,'$contentID','learn')";
                $queryUnified = mysqli_query($conn, $insertUnified);
            } else {
                echo "Error creating table: " . $conn->error;
            }
        } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
        }
        
    }
?>