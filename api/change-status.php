<?php

// server connection
include("connection.php");

// Set the default time zone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');

// checking for permission
if (isset($_POST["permission"]) && $_POST["permission"] == "Access") {

    // storing date and time in format for comparing to update
    $currentDate = date("Y-m-d");
    $currentTime = date("H:i");

    // Function to update the status of scheduled content
    function updateScheduledContent($conn, $tableName, $currentDate, $currentTime) {
        $selectQuery = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $selectQuery);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status = $row["status"];
                $date = date("Y-m-d", strtotime($row["date"]));
                $time = date("H:i", strtotime($row["time"]));
                $contentID = $row["contentID"];

                if ($status == "Schedule" && ($date < $currentDate || ($date == $currentDate && $time <= $currentTime))) {
                    $updateQuery = "UPDATE $tableName SET status='Public' WHERE contentID=?";
                    $stmt = mysqli_prepare($conn, $updateQuery);
                    mysqli_stmt_bind_param($stmt, 's', $contentID);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                }
            }
        } else {
            echo "Error fetching data from $tableName: " . mysqli_error($conn);
        }
    }

    // Update quickRead table
    updateScheduledContent($conn, 'quickRead', $currentDate, $currentTime);

    // Update learnMode table
    updateScheduledContent($conn, 'learnMode', $currentDate, $currentTime);

    echo "Content status has been successfully updated!";
}

?>