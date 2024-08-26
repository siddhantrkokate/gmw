<?php

include("../../../api/connection.php");

if (isset($_POST["contentID"]) && isset($_POST["moduleName"])) {
    
    $contentID = $_POST["contentID"];
    $moduleName = $_POST["moduleName"];

    function generateModuleId($title, $description) {
        $hash = hash('sha256', $title . $description);
        $moduleId = substr($hash, 0, 8);
        $moduleId .= '-' . rand(1000, 9999);
        return $moduleId;
    }

    $moduleID = generateModuleId($contentID, $moduleName);

    $s1 = "INSERT INTO `$contentID`(`moduleID`, `moduleName`) VALUES ('$moduleID', '$moduleName')";
    $q1 = mysqli_query($conn, $s1);

    if ($q1) {
        echo 10;
        $createTable = "CREATE TABLE IF NOT EXISTS `$moduleID` (
            `topicID` VARCHAR(255) NOT NULL,
            `topicName` VARCHAR(255) NOT NULL,
            `pdf` VARCHAR(255) NOT NULL,
            `video` VARCHAR(255) NOT NULL
        )";
        $queryTable = mysqli_query($conn, $createTable);
        
        if (!$queryTable) {
            echo "Error creating table: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting module: " . mysqli_error($conn);
    }
} else {
    echo "contentID and moduleName are required.";
}

?>