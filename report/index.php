
<?php

    include("../api/connection.php");
    
    session_start();
    
    $email = $_SESSION['email'];
    $contentID = $_GET['contentID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Content - Guide Me Web</title>
  
  <!-- google icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #FFF;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: "Poppins", sans-serif;
        }
        
        .container {
            margin: 20px;
            margin-top: 40px;
        }

        .ID {
            font-size: 15px;
            margin-top: 30px;
            margin-bottom: 10px;
            color: #757575;
        }

        .title {
            font-size: 15px;
            margin-bottom: 40px;
            color: #757575;
        }

        .report-type {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 0.1px solid #D5D8DC;
            color: #757575;
            font-size: 14px;
            cursor: pointer;
        }

        .selected {
            border-color: #000;
        }

        .text-box {
            padding: 15px;
            background-color: #FFF;
            color: #000;
            width: 100%;
            box-sizing: border-box;
            outline: none;
            margin-top: 20px;
            border: 0.1px solid #D5D8DC;
            border-radius: 5px;
        }

        .send-btn {
            background-color: #000;
            color: #FFF;
            margin-bottom: 10px;
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }
        
        strong{
            color: #000;
            font-weight: 400;
        }
        
        .heading-sub{
            margin-bottom: 10px;
            margin-top: 00px;
            font-size: 11px;
            text-align: center;
            color: #808B96;
        }
        
        .content-id{
            display: none;
        }
        
        .email{
            display: none;
        }
        
        @media screen and (min-width: 1300px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 40%;
            }
        }
        
        @media screen and (min-width: 1100px) and (max-width: 1299px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 60%;
            }
        }
        
        @media screen and (min-width: 900px) and (max-width: 1099px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 70%;
            }
        }
        
  </style>
</head>
<body>
    
    <div class="main-screen">
    <div class="screen">
    
    <?php include("../resources/header.php"); ?>
    
    <div class="container">
        
        <div class="heading-sub">Select Complaint Type</div>
        <div class="report-container">
            <div class="report-type"><strong>Sexual Content:</strong> Contains nudity, sexual acts, or sexually explicit language.</div>
            <div class="report-type"><strong>Violence:</strong> Depicts acts of violence, physical harm, or cruelty.</div>
            <div class="report-type"><strong>Hate Speech:</strong> Promotes hate or violence against individuals or groups based on race, religion, gender, or other characteristics.</div>
            <div class="report-type"><strong>Harassment/Bullying:</strong> Content that targets individuals or groups for harassment or bullying.</div>
            <div class="report-type"><strong>False Information:</strong> Contains false or misleading information.</div>
            <div class="report-type"><strong>Fake News:</strong> Spreads fabricated news stories or hoaxes.</div>
            <div class="report-type"><strong>Health Misinformation:</strong> Promotes false or dangerous health advice.</div>
            <div class="report-type"><strong>Spam:</strong> Repetitive or irrelevant content.</div>
            <div class="report-type"><strong>Scams:</strong> Content that tries to deceive users for financial or personal gain.</div>
            <div class="report-type"><strong>Phishing:</strong> Attempts to steal personal information or credentials.</div>
            <div class="report-type"><strong>Encourages Harm:</strong> Content that encourages dangerous or illegal activities.</div>
            <div class="report-type"><strong>Self-Harm:</strong> Promotes self-injury or suicide.</div>
            <div class="report-type"><strong>Copyright Infringement:</strong> Publicly revealing someone's private information.</div>
            <div class="report-type"><strong>Trademark Violations:</strong> Unauthorized use of trademarked logos or content.</div>
            <div class="report-type"><strong>Personal Information:</strong> Sharing private information without consent.</div>
            <div class="report-type"><strong>Doxxing:</strong> Publicly revealing someone's private information.</div>
            <div class="report-type"><strong>Offensive Language:</strong> Use of profane or offensive language.</div>
            <div class="report-type"><strong>Off-Topic Content: </strong> Irrelevant or unrelated to the platform’s purpose.</div>
            <div class="report-type"><strong>Other:</strong> Any other reason not listed above (with a text box for additional details).</div>
        </div>
        
        <textarea class="text-box" placeholder="Describe more here..." rows="6"></textarea>
        
        <div class="send-btn">send</div>
        
        <div class="content-id"><?php echo $contentID; ?></div>
        <div class="email"><?php echo $email; ?></div>
        
    </div>
    
    <script>
        $(".header-logo").text("Report");

        var reportType = "";
        $(".report-type").on("click", function() {
            $(".report-type").removeClass("selected");
            $(this).addClass("selected");
            reportType = $(this).text();
        });
        
        
        $(".send-btn").on("click",function(){
            var contentID = $(".content-id").text();
            var email = $(".email").text();
            
            var message = $('.text-box').val();
            
            if(contentID=="" || reportType==""){
                alert("Something went wrong. Please try after sometime!");
                return;
            }
            
            $.ajax({
                url:'backend.php',
                type:'POST',
                data:{
                    contentID:contentID,
                    email:email,
                    complaint:reportType,
                    message:message
                },
                success:function(response){
                    if(response==10){
                        confirm("Report submitted!");
                        window.location.href = "../view/?read="+contentID;
                        return;
                    }else{
                        alert("Something went wrong. Please Try again.");
                        return;
                    }
                }
            })
        })
        
    </script>
    
    </div>
</div>
    
</body>
</html>