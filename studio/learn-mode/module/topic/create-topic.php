
<?php
    
    $moduleID = $_GET['moduleID'];
    $title = $_GET['title'];
    $moduleName = $_GET['moduleName'];
    $contentID = $_GET["contentID"];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Topic - Guide Me Web</title>
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
        
        .heading{
            text-align: center;
            margin-top: 30%;
            font-size: 16px;
            margin-bottom: 40px;
        }
        
        .form-container{
            margin: 20px;
        }
        
        .input-fild{
            padding: 15px 20px;
            border: 0.1px solid #ddd;
            border-radius: 5px;
            width: calc(100% - 40px);
            outline: none;
        }
        
        .save-btn{
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
        
        .save-btn:hover{
            background-color: #FFF;
            color: #000;
        }
        
        .close-btn{
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
        
        .input-heading-special{
            font-size: 12px;
            color: #566573;
            margin-bottom: 10px;
            margin-top: 30px;
        }
        
        .module-id{
            display: none;
        }
        
        .module-name,.title{
            display: none;
        }
        
        .content-id{
            display: none;
        }
        
        .toast {
            background-color: #424949;
            color: #FFF;
            margin: 20px;
            position: fixed;
            bottom: 0;
            margin-bottom: 20px;
            padding: 20px 20px;
            width: calc(100% - 80px);
            font-size: 12px;
            border-radius: 5px;
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
                width: calc(40% - 80px);
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
                width: calc(60% - 80px);
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
                width: calc(70% - 80px);
            }
        }
    </style>

</head>

<body class="poppins-regular">

    <div class="main-screen">
        <div class="screen">
            
            <div class="module-name"><?php echo $moduleName; ?></div>
            <div class="title"><?php echo $title; ?></div>
            
            <div class="heading">Create new Topic</div>
            
            <div class="form-container">
                <div class="input-heading input-heading-special">Topic Name*</div>
                <input type="text" placeholder="Enter here" class="input-fild topic-name poppins-regular">
                
                <div class="input-heading input-heading-special">Content PDF*</div>
                <div class="upload-container">
                    <div class="upload-text">Choose Content File</div>
                    <input type="file" id="file-input" class="file-input file" accept="application/pdf">
                    <div class="upload-iocn material-icons">upload</div>
                </div>
                
                <div class="input-heading input-heading-special">YouTube Video</div>
                <input type="text" placeholder="URL" class="input-fild video poppins-regular">
                
                <div class="save-btn">Save</div>
                <div class="close-btn" title="Open Modules">close</div>
            </div>

        </div>
    </div>
    
    <div class="module-id"><?php echo $moduleID; ?></div>
    <div class="content-id"><?php echo $contentID; ?></div>
    
    <div class="toast"></div>
    
    <script>
        
        var moduleID = $(".module-id").text();
        var moduleName = $(".module-name").text();
        var title = $(".title").text();
        var contentID = $(".content-id").text();
        
        function showToastMessage(message) {
                    $(".toast").text(message).slideDown();
                    setTimeout(function () {
                        $(".toast").slideUp();
                    }, 3000);
                }
        
        
        $(".close-btn").on("click",function(){
            window.location.href = "index.php?moduleID="+moduleID+"&title="+title+"&moduleName="+moduleName+"&contentID="+contentID;
        })
        
        $('.file-input').change(function (event) {
                    const file = event.target.files[0];
                    const successMessage = $('.upload-text');

                    if (file && file.type === 'application/pdf') {
                        successMessage.text(`File chosen: ${file.name}`);
                        successMessage.show();
                    } else {
                        $(".toast").text("Please select the PDF file only.").show();
                    }
                });
                
                $(".save-btn").on("click",function(){
                    var topicName = $(".topic-name").val();
                    var file = $('.file-input')[0].files[0];
                    
                    var fileInput = document.querySelector('.file-input');
                    const selectedFile = fileInput.files[0];
                    
                    var video = $(".video").val();
                    
                    if(topicName==""){
                        showToastMessage("Enter valid topic name.");
                        return;
                    }else if(topicName.length>40){
                        showToastMessage("Topic name should not be more than 40 char long.");
                        return;
                    }else if (!selectedFile) {
                        showToastMessage("Please select a content file.");
                        return;
                    } else if (selectedFile.type != 'application/pdf') {
                        showToastMessage("Please select a PDF file.");
                        return;
                    }
                    
                    var formData = new FormData();
                    formData.append('topicName', topicName);

                    // youtube video validator function
                    function validateYouTubeUrl(url) {
                        const youtubeUrlRegex = /^https?:\/\/(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?([^&\s]+)$/;
                        return youtubeUrlRegex.test(url);
                    }

                    if (video === "") {

                    } else {
                        if (validateYouTubeUrl(video)) {

                        } else {
                            showToastMessage("Enter valid youtube video URL!");
                            return;
                        }
                    }
                    formData.append('video', video);
                    formData.append('pdf', file);
                    formData.append('moduleID', moduleID);

                    $.ajax({
                        url: 'create-topic-backend.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response == 10) {
                                window.location.href = "index.php?moduleID="+moduleID+"&title="+title+"&moduleName="+moduleName+"&contentID="+contentID;
                            } else {
                                $(".toast").text("Something went wrong. Please try agian!").slideDown().css("background-color", "red");
                                setTimeout(function () {
                                    $(".toast").slideUp().css("background-color", "red");
                                }, 3000);
                            }
                        }
                    })
                    
                })
    </script>

</body>

</html>