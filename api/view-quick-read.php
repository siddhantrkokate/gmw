<?php
include("connection.php");

if (isset($_POST['contentID'])) {
    $contentID = $_POST['contentID'];

    // Correcting the query string for selecting data
    $selectQ = "SELECT * FROM `quickRead` WHERE `contentID` = '$contentID'";
    $queryQ = mysqli_query($conn, $selectQ);

    // Checking if the query execution is successful
    if (!$queryQ) {
        echo "Query execution failed: " . mysqli_error($conn);
        exit();
    }

    // Fetching the result
    $resultQ = mysqli_fetch_assoc($queryQ);

    // Checking if the contentID exists
    if (!$resultQ) {
        echo "No quick read found with the provided contentID.";
        exit();
    }

    $views = $resultQ['contentViews'];
    $views++;

    // Correcting the query string for updating data
    $update = "UPDATE `quickRead` SET `contentViews` = '$views' WHERE `contentID` = '$contentID'";
    $queryQQ = mysqli_query($conn, $update);

    if ($queryQQ) {
        echo "View counted: Quick Read";
        exit();
    } else {
        echo "Problem in counting views for quick read: " . mysqli_error($conn);
        exit();
    }
}
?>