<?php

    include("../api/connection.php");

    if(isset($_POST['contentID']) && isset($_POST['email']) && isset($_POST['contentType'])){

        $contentID = $_POST['contentID'];
        $email = $_POST['email'];
        $contentType = $_POST['contentType'];

        $insert = "INSERT INTO likes (contentID, email) VALUES (?,?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "ss", $contentID, $email);
        mysqli_stmt_execute($stmt);

        if(mysqli_stmt_affected_rows($stmt) > 0){
            echo 10;
            
            if($contentType == 'quick'){
                
                $selectData = "SELECT * FROM quickRead WHERE contentID =?";
                $stmt = mysqli_prepare($conn, $selectData);
                mysqli_stmt_bind_param($stmt, "s", $contentID);
                mysqli_stmt_execute($stmt);
                $queryData = mysqli_stmt_get_result($stmt);
                
                $resultData = mysqli_fetch_assoc($queryData);
                
                $likes = $resultData['contentLikes'];
                $likes++;
                
                $updateData = "UPDATE `quickRead` SET `contentLike` =? WHERE contentID =?";
                $stmt = mysqli_prepare($conn, $updateData);
                mysqli_stmt_bind_param($stmt, "ss", $likes, $contentID);
                mysqli_stmt_execute($stmt);
                
            }else{
                $selectData = "SELECT * FROM learnMode WHERE contentID =?";
                $stmt = mysqli_prepare($conn, $selectData);
                mysqli_stmt_bind_param($stmt, "s", $contentID);
                mysqli_stmt_execute($stmt);
                $queryData = mysqli_stmt_get_result($stmt);
                
                $resultData = mysqli_fetch_assoc($queryData);
                
                $likes = $resultData['contentLikes'];
                $likes++;
                
                $updateData = "UPDATE `learnMode` SET `contentLike` =? WHERE contentID =?";
                $stmt = mysqli_prepare($conn, $updateData);
                mysqli_stmt_bind_param($stmt, "ss", $likes, $contentID);
                mysqli_stmt_execute($stmt);
            }
            
            exit();
        }else{
            echo mysqli_error($conn); // print the error message
            echo 20;
            exit();
        }

    } else {
        echo "Invalid request";
        exit();
    }

?>