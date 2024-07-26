<?php

include ('../../../api/connection.php');

session_start();

$title;

if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {

    if (isset($_GET['contentID'])) {
        $contentID = $_GET['contentID'];

        // Debugging statement
        error_log("Content ID: " . $contentID);

        $contentData = "SELECT * FROM learnMode WHERE contentID='$contentID'";
        $queryData = mysqli_query($conn, $contentData);

        if ($queryData) {
            // Debugging statement
            error_log("Query executed successfully");

            if (mysqli_num_rows($queryData) > 0) {
                $contentDataShow = mysqli_fetch_assoc($queryData);
                $userID = $contentDataShow["userID"];

                // Selecting user's id
                $email = $_SESSION['email'];

                $selectUser = "SELECT * FROM users WHERE user_email='$email'";
                $queryUser = mysqli_query($conn, $selectUser);

                if ($queryUser) {
                    $fetchUsers = mysqli_fetch_assoc($queryUser);
                    $userIDFromUsers = $fetchUsers["user_id"];

                    if ($userIDFromUsers != $userID) {
                        header("Location: ../../../profile");
                        exit();
                    }
                } else {
                    echo "Failed to connect with user";
                    exit();
                }
            } else {
                echo "No content found with the given content ID";
                exit();
            }
        } else {
            // Debugging statement
            error_log("Query execution failed: " . mysqli_error($conn));
        }
    } else {
        echo "Content ID not set";
        exit();
    }
} else {
    header("Location: ../../../profile");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- basic meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modules - Guide Me Web</title>

    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- css -->
    <style>
        body {
            margin: 0;
        }

        /* poppins google font */
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        /* header */
        .header {
            padding: 20px;
            display: flex;
            flex-direction: row;
            position: fixed;
            top: 0px;
            width: 100%;
            box-sizing: border-box;
            color: #000;
            background-color: #FFF;
            border-bottom: 0.1px solid #E6E6E6;
        }

        .header-heading {
            margin-right: auto;
        }

        .header-close-button {
            margin-left: auto;
            cursor: pointer;
        }

        .toast {
            position: fixed;
            bottom: 0;
            margin-bottom: 60px;
            margin: 20px;
            padding: 15px 20px 15px 20px;
            background-color: red;
            color: white;
            font-size: 13px;
            border-radius: 5px;
            width: calc(100% - 40px);
            box-sizing: border-box;
            display: none;
        }


        .content-id {
            display: none;
        }

        .content-data-container {
            display: flex;
            flex-direction: column;
            margin: 20px;
            margin-top: 80px;
            border: 0.1px solid #ddd;
            border-radius: 5px;
        }

        .content-data-lable {
            padding: 5px 20px;
            background-color: #EAECEE;
            color: #000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        .content-title {
            padding: 10px 20px;
            font-size: 13px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .create-module-btn {
            margin: 20px;
            margin-top: 10px;
            border: 0.1px solid #000;
            padding: 10px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background-color: #000;
            border-radius: 5px;
            color: #FFF;
            cursor: pointer;
            transition: background-color 0.3s ease-in;
            font-size: 13px;
        }

        .text-btn {
            margin-right: 10px;
        }

        .create-module-btn:hover {
            background-color: #FFF;
            color: #000;
        }

        .module-list-container {
            margin: 20px;
            margin-top: 10px;
        }

        .module-item-container {
            border: 0.1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .module-item-name {
            padding: 20px;
        }

        .module-item-btn-container {
            display: flex;
            flex-direction: row;
            width: 100%;
            border: 0px solid red;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .module-item-btn {
            flex: 1;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border: 0.1px solid #ddd;
            background-color: #EAECEE;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease-in;
        }

        .module-item-btn:hover {
            background-color: #000;
            color: #fff;
        }

        .module-item-btn-text {
            font-size: 13px;
            margin-right: 10px;
        }

        .heading-module {
            text-align: center;
            font-size: 12px;
            margin-top: 40px;
        }
        
        .module-id{
            display: none;
        }

        @media screen and (min-width: 1300px) {
            .main-screen {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .header {
                width: 40%;
            }

            .screen {
                width: 40%;
            }

            .toast {
                width: calc(40% - 40px);
            }

        }

        @media screen and (min-width: 1100px) and (max-width: 1299px) {
            .main-screen {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .header {
                width: 60%;
            }

            .screen {
                width: 60%;
            }

            .toast {
                width: calc(60% - 40px);
            }

        }

        @media screen and (min-width: 900px) and (max-width: 1099px) {
            .main-screen {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .header {
                width: 70%;
            }

            .screen {
                width: 70%;
            }

            .toast {
                width: calc(70% - 40px);
            }

        }
    </style>

</head>

<body class="poppins-regular">

    <div class="main-screen">
        <div class="screen">


            <!-- header -->

            <div class="header">
                <div class="header-heading">Module Customization</div>
                <div class="header-close-button material-icons" title="Discard">close</div>
            </div>

            <div class="content-data-container">
                <div class="content-data-lable">Content Title</div>
                <div class="content-title"><?php echo htmlspecialchars($contentDataShow['title']); ?></div>
            </div>

            <div class="heading-module">Your Modules</div>

            <div class="module-list-container">
                
    <?php
        // Assuming $contentID is sanitized and valid table name
        $selectModule = "SELECT * FROM `".$contentID."`";
        $queryModule = mysqli_query($conn, $selectModule);
        
        if (!$queryModule) {
            echo "Problem in module query: " . mysqli_error($conn);
        } else {
            while ($showModule = mysqli_fetch_assoc($queryModule)) {
    ?>

    <div class="module-item-container">

        <div class="module-item-name"><?php echo htmlspecialchars($showModule['moduleName']); ?></div>
        
        <div class="module-id"><?php echo $showModule['moduleID']; ?></div>

        <div class="module-item-btn-container">

            <div class="module-item-btn edit" title="Make the changes.">
                <div class="module-item-btn-text">Edit</div>
                <div class="module-item-btn-icon material-icons" style="font-size: 15px;">edit</div>
            </div>
            <div class="module-item-btn delete" title="Remove module.">
                <div class="module-item-btn-text">Delete</div>
                <div class="module-item-btn-icon material-icons" style="font-size: 15px;">delete</div>
            </div>
            <div class="module-item-btn topic" title="View topic customization hun.">
                <div class="module-item-btn-text">Topics</div>
                <div class="module-item-btn-icon material-icons" style="font-size: 15px;">fullscreen</div>
            </div>

        </div>

    </div>
    
    <?php 
            }
        }
    ?>

</div>


            <div class="create-module-btn" title="Add new module.">
                <div class="text-btn">create new module</div>
                <div class="material-icons" style="font-size: 18px;">add</div>
            </div>

            <div class="content-id"><?php echo htmlspecialchars($contentID); ?></div>



            <!-- toast -->
            <div class="toast">Please choose content file!</div>

            <script>

                var contentID = $(".content-id").text();
                $(".header-close-button").on("click", function () {
                    window.location.href = "../../../studio";
                });

                $(".create-module-btn").on("click", function () {
                    window.location.href = "create-module.php?contentID=" + contentID;
                });

                $(".edit").on("click", function () {
                    var moduleID = $(this).closest(".module-item-container").find(".module-id").text();
                    window.location.href = "update-module.php?contentID=" + contentID + "&moduleID=" + moduleID;
                })
                
                $(".delete").on("click", function() {
                    var moduleID = $(this).closest(".module-item-container").find(".module-id").text();
                    $.ajax({
                        url:'delete-module.php',
                        type:'POST',
                        data:{
                            contentID:contentID,
                            moduleID:moduleID
                        },
                        success:function(response){
                            console.log(response);
                            location.reload();
                        }
                    })
                });
                
                $(".topic").on("click", function() {
                    var title = $(".content-title").text();
                    var moduleID = $(this).closest(".module-item-container").find(".module-id").text();
                    var moduleName = $(this).closest(".module-item-container").find(".module-item-name").text();
                    window.location.href = "topic/index.php?contentID=" + contentID + "&moduleID=" + moduleID + "&title=" + title + "&moduleName=" + moduleName;
                });

            </script>

        </div>
    </div>

</body>

</html>