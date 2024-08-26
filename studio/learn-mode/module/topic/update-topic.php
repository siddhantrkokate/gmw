<?php
    // Database connection
    // Make sure to include your database connection file or code here
    include('../../../../api/connection.php'); // Adjust this line as needed

    $moduleID = $_GET['moduleID'];
    $title = $_GET['title'];
    $moduleName = $_GET['moduleName'];
    $topicID = $_GET['topicID'];
    $contentID = $_GET['contentID'];
    
    // Use backticks for table name
    $selectData = "SELECT * FROM `$moduleID` WHERE topicID = ?";
    
    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare($selectData);
    $stmt->bind_param('s', $topicID);
    $stmt->execute();
    $queryData = $stmt->get_result();

    if($queryData->num_rows > 0){
        $resultData = $queryData->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Topic - Guide Me Web</title>
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
            padding: 0;
            background-color: #FFF;
            color: #000;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        /* poppins google font */
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .heading {
            text-align: center;
            margin-top: 30%;
            font-size: 16px;
            margin-bottom: 40px;
        }
        .form-container {
            margin: 20px;
        }
        .input-fild {
            padding: 15px 20px;
            border: 0.1px solid #ddd;
            border-radius: 5px;
            width: calc(100% - 40px);
            outline: none;
        }
        .save-btn {
            background-color: #000;
            color: #FFF;
            padding: 10px 20px;
            text-align: center;
            width: calc(100% - 40px);
            border: 0.1px solid #000;
            border-radius: 5px;
            margin-top: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease-in;
        }
        .save-btn:hover {
            background-color: #FFF;
            color: #000;
        }
        .close-btn {
            padding: 10px 20px;
            border: 0.1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            width: calc(100% - 40px);
            margin-top: 10px;
            cursor: pointer;
            background-color: #EAECEE;
        }
        /* upload file selector */
        .upload-container {
            border: 1px solid #B0B0B0;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 100%;
        }
        .upload-text {
            padding: 15px;
            color: #cccccc;
            font-size: 13px;
            margin-right: auto;
        }
        .upload-iocn {
            padding: 15px;
            background-color: #2c2c2c;
            color: white;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            font-size: 23px;
        }
        .file-input {
            position: absolute;
            width: 100%;
            opacity: 0;
        }
        .input-heading-special {
            font-size: 12px;
            color: #566573;
            margin-bottom: 10px;
            margin-top: 30px;
        }
        .module-id {
            display: none;
        }
        .module-name, .title, .topic-id, .content-id {
            display: none;
        }
        
        .toast{
            position: fixed;
            bottom: 0;
            margin: 20px;
            margin-bottom: 85px;
            padding: 15px 20px;
            background-color: #2e2e2e;
            color: #e0e0e0;
            font-size: 13px;
            border-radius: 5px;
            width: calc(100% - 40px);
            box-sizing: border-box;
            display: none;
        }

        @media screen and (min-width: 1300px) {
            .main-screen {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
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
            <div class="module-name"><?php echo $moduleName; ?></div>
            <div class="title"><?php echo $title; ?></div>
            <div class="topic-id"><?php echo $topicID; ?></div>
            <div class="heading">Edit Topic</div>
            <div class="form-container">
                <div class="input-heading input-heading-special">Topic Name*</div>
                <input type="text" placeholder="Enter here" value="<?php echo htmlspecialchars($resultData['topicName']); ?>" class="input-fild topic-name poppins-regular">
                <div class="input-heading input-heading-special">YouTube Video</div>
                <input type="text" placeholder="URL" class="input-fild video poppins-regular" value="<?php echo htmlspecialchars($resultData['video']); ?>">
                <div class="save-btn">Save</div>
                <div class="close-btn" title="Open Modules">close</div>
            </div>
            <div class="toast"></div>
        </div>
    </div>
    <div class="module-id"><?php echo $moduleID; ?></div>
    <div class="content-id"><?php echo $contentID; ?></div>
    <script>
        var moduleID = $(".module-id").text();
        var moduleName = $(".module-name").text();
        var title = $(".title").text();
        var topicID = $(".topic-id").text();
        var contentID = $(".content-id").text();

        function validateYouTubeUrl(url) {
            const youtubeUrlRegex = /^https?:\/\/(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?([^&\s]+)$/;
            return youtubeUrlRegex.test(url);
        }

        function showToastMessage(message) {
            $(".toast").text(message).slideDown();
            setTimeout(function () {
                $(".toast").slideUp();
            }, 3000);
        }

        $(".close-btn").on("click", function() {
            window.location.href = "index.php?moduleID=" + moduleID + "&title=" + title + "&moduleName=" + moduleName + "&contentID="+contentID;
        });

        $(".save-btn").on("click", function() {
            var topicName = $(".topic-name").val();
            var video = $(".video").val();

            if (topicName === "") {
                showToastMessage("Please provide topic name.");
               

 return;
            } else if (topicName.length > 40) {
                showToastMessage("Topic name should be in max 40 chars.");
                return;
            }

            if (video !== "") {
                if (!validateYouTubeUrl(video)) {
                    showToastMessage("Enter valid YouTube video URL!");
                    return;
                }
            }

            $.ajax({
                url: 'update-backend.php',
                type: 'POST',
                data: {
                    topicName: topicName,
                    video: video,
                    topicID: topicID,
                    moduleID: moduleID
                },
                success: function(response) {
                    if (response == 10) {
                        showToastMessage("Topic data updated!");
                    } else {
                        showToastMessage("Something went wrong. Try Again!");
                    }
                }
            });
        });
    </script>
</body>
</html>