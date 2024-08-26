<?php
session_start();
include("../../../../api/connection.php");

if (!isset($_SESSION["email"])) {
    header("Location: ../../../../home");
    exit();
}

$contentID = isset($_GET['contentID']) ? htmlspecialchars($_GET['contentID']) : '';
$moduleID = isset($_GET['moduleID']) ? htmlspecialchars($_GET['moduleID']) : '';
$title = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '';
$moduleName = isset($_GET['moduleName']) ? htmlspecialchars($_GET['moduleName']) : '';

// Use backticks for table name
    $selectData = "SELECT * FROM `$moduleID`";
    
    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare($selectData);
    $stmt->execute();
    $queryData = $stmt->get_result();

    if($queryData->num_rows > 0){
        $resultData = $queryData->fetch_assoc();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topics - Guide Me Web</title>

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
            padding: 15px 20px;
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

        .content-data-label {
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
            /*word-wrap: break-word;*/
            /*overflow-wrap: break-word;*/
            /*white-space: normal;*/
            /*width: 100%;*/
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
            font-size: 13px;
            transition: background-color 0.3s ease;
        }

        .text-btn {
            margin-right: 10px;
        }
        
        .create-module-btn:hover{
            color: #000;
            background-color: #FFF;
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
        
        .module-item-btn:hover{
            background-color: #000;
            color: #FFF;
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

        .module-container {
            margin-top: 20px;
        }

        .topic-id {
            display: none;
        }
        
        .module-id-p,.content-id{
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
                <div class="header-heading">Topic Customization</div>
                <div class="header-close-button material-icons" title="Open Modules">close</div>
            </div>

            <div class="content-data-container">
                <div class="content-data-label">Content title</div>
                <div class="content-title"><?php echo $title; ?></div>
            </div>

            <div class="content-data-container module-container">
                <div class="content-data-label">Module Name</div>
                <div class="content-title module-name"><?php echo $moduleName; ?></div>
            </div>

            <div class="heading-module">Your Topics</div>

            <div class="module-list-container">

                <?php
                $selectdata = "SELECT * FROM `$moduleID`";
                $querydata = mysqli_query($conn, $selectdata);

                if (!$querydata) {
                    echo "<div class='toast'>Query failed to fetch the data of topics</div>";
                } else {
                    while ($resultdata = mysqli_fetch_assoc($querydata)) {
                ?>

                        <div class="module-item-container">
                            <div class="module-item-name"><?php echo $resultdata['topicName']; ?></div>
                            <div class="module-item-btn-container">
                                <div class="module-item-btn edit" title="Edit topic">
                                    <div class="topic-id"><?php echo $resultdata['topicID']; ?></div>
                                    <div class="module-item-btn-text">Edit</div>
                                    <div class="module-item-btn-icon material-icons" style="font-size: 15px;">edit</div>
                                </div>
                                <div class="module-item-btn delete" title="Remove">
                                    <div class="topic-id"><?php echo $resultdata['topicID']; ?></div>
                                    <div class="module-item-btn-text">Delete</div>
                                    <div class="module-item-btn-icon material-icons" style="font-size: 15px;">delete</div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>

            <div class="create-module-btn">
                <div class="text-btn">Create new topic</div>
                <div class="material-icons" style="font-size: 18px;">add</div>
            </div>

            <div class="content-id"><?php echo $contentID; ?></div>
            <div class="module-id-p"><?php echo $moduleID; ?></div>

            <!-- toast -->
            <div class="toast">Please choose content file!</div>

            <script>
                
                var contentID = $(".content-id").text();
                var moduleIDp = $(".module-id-p").text();
                var title = $(".content-title").text();
                var moduleName = $(".module-name").text();
            

                $(".header-close-button").on("click", function() {
                    window.location.href = "../index.php?contentID=" + contentID;
                });

                $(".create-module-btn").on("click", function() {
                    window.location.href = "create-topic.php?moduleID=" + moduleIDp + "&title=" + title + "&moduleName=" + moduleName + "&contentID=" + contentID;
                });

                $(".edit").on("click", function() {
                    var topicID = $(this).find(".topic-id").text();
                    window.location.href = "update-topic.php?moduleID=" + moduleIDp + "&title=" + title + "&moduleName=" + moduleName + "&topicID=" + topicID + "&contentID=" + contentID;
                });

                $(".delete").on("click", function() {
                    var topicID = $(this).find(".topic-id").text();
                    
                    $.ajax({
                        url:'delete.php',
                        type:'POST',
                        data:{
                            topicID:topicID,
                            moduleID:moduleIDp
                        },
                        success:function(repsonse){
                            location.reload();
                        }
                    })
                    // Add delete functionality here, e.g., an AJAX request to delete the topic from the database
                });
            </script>

        </div>
    </div>

</body>

</html>