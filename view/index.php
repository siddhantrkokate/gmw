<?php

// server setup all done 
include ("../api/connection.php");

// getting contentID from URL
$contentID = $_GET['read'];

// selecting contentType from unified
$s1 = "SELECT * FROM unified WHERE contentID='$contentID'";
$q1 = mysqli_query($conn, $s1);

$typeOfContent = "";

session_start();
if(isset($_SESSION["email"])){
    $email = $_SESSION['email'];
}

if (mysqli_num_rows($q1) > 0) {
    $r1 = mysqli_fetch_assoc($q1);
    $typeOfContent = $r1["type"];

    if ($typeOfContent == "quick") {
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
        $s2 = "SELECT * FROM quickRead WHERE contentID='$contentID'";
        $q2 = mysqli_query($conn, $s2);

        if (mysqli_num_rows($q2) > 0) {
            $r2 = mysqli_fetch_assoc($q2);
            // process quick read content
        } else {
            echo "Invalid Request";
        }
    } else if ($typeOfContent == "learn") {
        // Correcting the query string for selecting data
        $selectL = "SELECT * FROM `learnMode` WHERE `contentID` = '$contentID'";
        $queryL = mysqli_query($conn, $selectL);

        // Checking if the query execution is successful
        if (!$queryL) {
            echo "Query execution failed: " . mysqli_error($conn);
            exit();
        }

        // Fetching the result
        $resultL = mysqli_fetch_assoc($queryL);

        // Checking if the contentID exists
        if (!$resultL) {
            echo "No quick read found with the provided contentID.";
            exit();
        }

        $views = $resultL['contentViews'];
        $views++;

        // Correcting the query string for updating data
        $update = "UPDATE `learnMode` SET `contentViews` = '$views' WHERE `contentID` = '$contentID'";
        $queryLL = mysqli_query($conn, $update);

        $s2 = "SELECT * FROM learnMode WHERE contentID='$contentID'";
        $q2 = mysqli_query($conn, $s2);

        if (mysqli_num_rows($q2) > 0) {
            $r2 = mysqli_fetch_assoc($q2);
            // process learn mode content
        } else {
            echo "Invalid Request";
        }
    }
} else {
    echo "Content not found";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $r2['title']; ?> - Guide Me Web</title>

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

        /* page container */
        .container {
            margin:30px 20px;
        }

        /* content data */
        .title {
            margin-top: 10px;
            font-size: 17px;
        }

        .description {
            margin-top: 20px;
            font-size: 13px;
            color: #999999;
        }

        /* content assets */
        .assets {
            display: flex;
            flex-direction: column;
            margin-top: 0px;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .single-assets {
            display: flex;
            flex-direction: row;
            font-size: 15px;
            color: #000;
            justify-content: center;
            align-items: center;
            border: 0.1px solid #ddd;
            width: min-content;
            padding: 5px 30px;
            margin-left: auto;
            border-radius: 50px;
            /*margin-right: 20px;*/
        }

        .assets-text {
            margin-left: auto;
            font-size: 12px;
        }

        .assets-icon {
            font-size: 20px;
            margin-left: 5px;
            display: none;
        }

        .reaction {
            margin-top: 40px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            width: 100%;
            border-bottom: 0.1px solid #aaa;
            padding-bottom: 20px;
        }

        .reaction-type {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: calc(100%/2 - 32px);
            padding: 10px;
            background-color: #EAECEE;
            color: #121212;
            margin: 5px;
            font-size: 13px;
            border-radius: 5px;
            cursor: pointer;
            border: 0.1px solid #EAECEE;
        }

        .reaction-icon {
            margin-left: 10px;
        }

        .active {
            background-color: #3b5998;
            color: #fff;
        }

        .active-2 {
            background-color: red;
            color: #fff;
        }

        .single-page-content {
            margin-top: 40px;
        }

        .single-page {
            display: flex;
            flex-direction: row;
            font-size: 16px;
            border: 0.1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            padding-bottom: 7px;
            cursor: pointer;
        }

        .single-page-img {
            max-width: 20px;
            max-height: 20px;
        }

        .single-page-text {
            margin-left: 20px;
            color: #000;
            font-size: 13px;
        }

        .text {}

        .multi-container {
            margin-top: 30px;
            padding: 10px;
        }

        .multi-module-container {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .multi-module-name {
            font-size: 15px;
            cursor: pointer;
        }

        .multi-topic-container {
            margin-top: 20px;
            margin-bottom: 0px;
            padding: 20px;
            border-radius: 5px;
            background-color: #ddd;
            /*display: none;*/
        }

        .multi-topic-name {
            font-size: 13px;
        }

        .multi-topic-menu {
            margin-top: 10px;
            margin-bottom: 0px;
        }

        .multi-topic-btn {
            font-size: 12px;
            color: #FFF;
            background-color: #FF0000;
            margin-bottom: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .pdf {
            background-color: #3b5998;
        }

        .content-id {
            display: none;
        }

        .content-type {
            display: none;
        }
        
        .unlike{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .unsave{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .topic-iid{
            display:none;
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
        
        .pdf-quick-ll{
            display: none;
        }
        
        .yt-quick-ll{
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

            .toast{
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

            .toast{
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

            .toast{
                width: calc(70% - 40px);
            }
        }
    </style>

</head>

<body class="poppins-regular">

    <div class="main-screen">
        <div class="screen">

            <!-- header -->
            <?php include ("../resources/header.php"); ?>

            <!-- content -->
            <div class="container">

                <!-- content ID and basic-->
                <div class="content-id"><?php echo $contentID; ?></div>
                <div class="content-type"><?php echo $email; ?></div>

                <div class="assets">
                    <div class="single-assets">
                        <div class="assets-text"><?php echo $r2['contentViews']; ?></div>
                        <div class="assets-icon material-icons" style="font-size: 13px;">visibility</div>
                    </div>
                </div>

                <div class="title"><?php echo $r2['title']; ?></div>
                <div class="description"><?php echo $r2['description']; ?></div>


                <div class="reaction">
                    <div class="reaction-type like" title="Like">
                        <div class="reaction-text"><?php echo $r2['contentLike']; ?></div>
                        <div class="reaction-icon material-icons" style="font-size: 17px;">thumb_up</div>
                    </div>
                    <div class="reaction-type unlike active" title="Dislike">
                        <div class="reaction-text"><?php echo $r2['contentLike']; ?></div>
                        <div class="reaction-icon material-icons" style="font-size: 17px;">thumb_up</div>
                    </div>
                    <div class="reaction-type save" title="save content">
                        <div class="reaction-text">Save</div>
                        <div class="reaction-icon material-icons" style="font-size: 17px;">bookmark</div>
                    </div>
                    <div class="reaction-type unsave active-2" title="Remove saved">
                        <div class="reaction-text">Saved</div>
                        <div class="reaction-icon material-icons" style="font-size: 17px;">bookmark</div>
                    </div>
                    <div class="reaction-type report" title="Report content">
                        <div class="reaction-text">Report</div>
                        <div class="reaction-icon material-icons" style="font-size: 17px;">report</div>
                    </div>
                    <div class="reaction-type share" title="Share with friends!">
                        <div class="reaction-text">Share</div>
                        <div class="reaction-icon material-icons" style="font-size: 17px;">share</div>
                    </div>
                </div>

                <?php

                if ($typeOfContent == "quick") {

                    ?>

                    <div class="single-page-content">
                        <div class="single-page pdf-quick" title="Open PDF">
                            <div class="pdf-quick-ll"><?php echo $r2['pdf']; ?></div>
                            <div class="single-page-icon"><img src="pdf-file-format.png" class="single-page-img"></div>
                            <div class="single-page-text" style="">PDF content.</div>
                        </div>
                        <?php
                            $videoYTQ = $r2['video'];
                            if($videoYTQ==""){
                                
                            }else{
                        ?>
                        <div class="single-page yt-quick" title="Watch video">
                            <div class="yt-quick-ll"><?php echo $r2['video']; ?></div>
                            <div class="single-page-icon"><img src="youtube.png" class="single-page-img"></div>
                            <div class="single-page-text">YouTube content.</div>
                        </div>
                        <?php } ?>
                    </div>

                    <?php
                } else {


                    ?>

                        <div class="multi-container">

                            <?php

                            $s3 = "SELECT `moduleID`, `moduleName` FROM `$contentID`";
                            $q3 = mysqli_query($conn, $s3);

                            while ($r3 = mysqli_fetch_assoc($q3)) {
                                $moduleID = $r3['moduleID'];
                                ?>
                                <div class="multi-module-container">
                                    <div class="multi-module-name"><?php echo $r3['moduleName']; ?></div>
                                    
                                    <?php

                                    $s4 = "SELECT `topicID`, `topicName`, `pdf`, `video` FROM `$moduleID`";
                                    $q4 = mysqli_query($conn, $s4);

                                    while ($r4 = mysqli_fetch_assoc($q4)) {

                                        ?>
                                        <div class="multi-topic-container">
                                            <div class="multi-topic-name"><?php echo $r4['topicName']; ?></div>
                                            <div class="multi-topic-menu">
                                                <div class="multi-topic-btn pdf-learn" style="background-color: #3b5998;" title="view pdf"><div class="topic-iid"><?php echo $r4['pdf']; ?></div>PDF</div>
                                                <?php
                                                    $videoYT = $r4['video'];
                                                    if($videoYT==""){
                                                        
                                                    }else{
                                                ?>
                                                <div class="multi-topic-btn video yt-learn" title="watch video"><div class="topic-iid"><?php echo $r4['video']; ?></div>YouTube video</div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                        <?php } ?>

                        </div>
                <?php } ?>

                                        <br>
                <script>
                
                    $('.unsave').hide();
                    $('.unlike').hide();
                    
                    var email = $(".content-type").text();
                    var contentID= $(".content-id").text();
                    var contentType = "<?php echo $typeOfContent; ?>";

                    // changing the header heading
                    $(".header-logo").text("Gide Me Web");

                    function showToastMessage(message) {
                        $(".toast").text(message).fadeIn();
                        setTimeout(function () {
                            $(".toast").fadeOut();
                        }, 3000);
                    }
                    
                    $.ajax({
                        url:'check-like.php',
                        type:'POST',
                        data:{
                            contentID:contentID,
                            email:email
                        },
                        success:function(response){
                            console.log("like checks!");
                            if(response==20){
                                $(".like").hide();
                                $(".unlike").show();
                            }else{
                                $(".like").show();
                                $(".unlike").hide();
                            }
                        }
                    })
                    
                    $.ajax({
                        url:'check-save.php',
                        type:'POST',
                        data:{
                            contentID:contentID,
                            email:email
                        },
                        success:function(response){
                            console.log("save checks!");
                            if(response==20){
                                $(".save").hide();
                                $(".unsave").show();
                            }else{
                                $(".save").show();
                                $(".unsave").hide();
                            }
                        }
                    })
                    
                    $(".like").on("click",function(){
                        $.ajax({
                            url:'like.php',
                            type:'POST',
                            data:{
                                contentID:contentID,
                                email:email,
                                contentType:contentType
                            },
                            success:function(response){
                                console.log("liked!");
                                if(response==20){
                                    $(".like").show();
                                    $(".unlike").hide();
                                    showToastMessage("Something went wrong. Try Again!");
                                }else{
                                    $(".like").hide();
                                    $(".unlike").show();
                                    showToastMessage("Liked");
                                }
                            }
                        })
                    })
                    
                    $(".unlike").on("click",function(){
                        $.ajax({
                            url:'unlike.php',
                            type:'POST',
                            data:{
                                contentID:contentID,
                                email:email,
                                contentType:contentType
                            },
                            success:function(response){
                                console.log("unliked!");
                                if(response==20){
                                    $(".like").hide();
                                    $(".unlike").show();
                                    showToastMessage("Something went wrong. Please Try Again!");
                                }else{
                                    $(".like").show();
                                    $(".unlike").hide();
                                    showToastMessage("Disliked");
                                }
                            }
                        })
                    })
                    
                    $(".save").on("click",function(){
                        $.ajax({
                            url:'save.php',
                            type:'POST',
                            data:{
                                contentID:contentID,
                                email:email,
                                contentType:contentType
                            },
                            success:function(response){
                                console.log("saved!");
                                if(response==10){
                                    $(".save").hide();
                                    $(".unsave").show();
                                    showToastMessage("Saved");
                                }else{
                                    $(".save").show();
                                    $(".unsave").hide();
                                    showToastMessage("Something went wrong. Please Try Again!");
                                }
                            }
                        })
                    })
                    
                    $(".unsave").on("click",function(){
                        $.ajax({
                            url:'unsave.php',
                            type:'POST',
                            data:{
                                contentID:contentID,
                                email:email,
                                contentType:contentType
                            },
                            success:function(response){
                                console.log("unsave!");
                                if(response==10){
                                    $(".save").show();
                                    $(".unsave").hide();
                                    showToastMessage("Unsaved.");
                                }else{
                                    $(".save").hide();
                                    $(".unsave").show();
                                    showToastMessage("Something went wrong. Please Try Again!");
                                }
                            }
                        })
                    })
                    
                    $(".share").on("click",function(){
                        if (navigator.share) {
                                navigator.share({
                                    title: document.title,
                                    url: window.location.href
                                }).then(() => {
                                    console.log('Thanks for sharing!');
                                })
                                    .catch(console.error);
                            } else {
                                showToastMessage("Web Share API not supported in your browser.");
                            }
                    })
                    
                    $(".report").on("click",function(){
                        window.location.href = "../report/?contentID="+contentID+"&contentType="+contentType+"&email="+email;
                    })
                    
                    $(".multi-module-container").on("click",function(){
                        $(this).find(".multi-topic-container").slideToggle();
                    });
                    
                    $(".pdf-quick").on("click",function(){
                        var pdf = $(".pdf-quick-ll").text();
                        window.location.href = "../pdf-view/index.php?pdf=" + pdf;
                    })
                    
                    $(".yt-quick").on("click",function(){
                        var video = $(".yt-quick-ll").text();
                        window.location.href = "../video-view/index.php?video=" + video;
                    })
                    
                    $(".pdf-learn").on("click",function(){
                        var topic = $(this).find(".topic-iid").text();
                        window.location.href = "../pdf-view/index.php?pdf=" + topic;
                    })
                    
                    $(".yt-learn").on("click",function(){
                        var topic = $(this).find(".topic-iid").text();
                        window.location.href = "../video-view/index.php?video=" + topic;
                    })
                </script>

            </div>
        </div>
        
        <!-- bottom menu -->
                <?php include ("../resources/bottom.php"); ?>
                
                <div class="toast"></div>

</body>

</html>