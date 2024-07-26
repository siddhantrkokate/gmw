<?php

include("../../../../api/connection.php");

if(isset($_POST['topicName']) && isset($_POST['topicID']) && isset($_POST['video']) && isset($_POST['moduleID'])) {
    
    $topicName = mysqli_real_escape_string($conn, $_POST['topicName']);
    $topicID = mysqli_real_escape_string($conn, $_POST['topicID']);
    $video = mysqli_real_escape_string($conn, $_POST['video']);
    $moduleID = mysqli_real_escape_string($conn, $_POST['moduleID']);
    
    $update = "UPDATE `$moduleID` SET `topicName`='$topicName', `video`='$video' WHERE `topicID`='$topicID'";
    $queryUpdate = mysqli_query($conn, $update);
    
    if(!$queryUpdate) {
        echo 20;
    } else {
        echo 10;
    }
    
    mysqli_close($conn);
}

?>