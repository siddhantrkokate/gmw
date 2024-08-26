<?php

session_start();

if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    
}else{
    header("Location: ../profile");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save - Guide Me Web</title>
    
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
        
        /* page container */
        .container{
            margin: 20px;
            margin-top: 40px;
        }
        
        /* content slide container single */
        .read-page-content-container{
            border: 1px solid #E6E6E6;
            width: 100%;
            box-sizing: border-box;
            border-radius: 7px;
            margin-bottom: 20px;
            cursor: pointer;
        }
        
        .read-page-title{
            padding: 20px;
            color: #000;
            font-size: 16px;
        }
        
        .read-page-description{
            font-size: 13px;
            color: #999999;
            margin-top: -7px;
            padding: 10px 20px;
        }
        
        .read-page-assets-container{
            display: flex;
            flex-direction: row;
            width: 100%;
            margin-top: 10px;
        }
            
        .read-page-assets-item{
            width: calc(100%/3);
            padding: 10px;
            color: #5D6D7E;
            font-size: 12px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border: 0.1px solid #EBEDEF;
        }
        
        .read-page-assets-icon{
            font-size: 15px;
            margin-left: 10px;
            margin-top: -2px;
        }
        
        .content-id{
            display: none;
        }
        
        .read-page-btns{
            background-color: #EAECEE;
            color: #000;
            padding: 10px 20px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        
        .read-page-save-btn{
            margin-left: auto;
            color: #E74C3C;
            
        }
        
        .read-page-save-text{
            font-size: 13px;
        }
        
        /* toast message */
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
        
        .heading-sub{
            margin-bottom: 10px;
            margin-top: 00px;
            font-size: 11px;
            text-align: center;
            color: #808B96;
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
            
            .toast{
                width: calc(40% - 40px);
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
            
            .toast{
                width: calc(60% - 40px);
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
    <?php include("../resources/header.php"); ?>
    
    <!-- content -->
    <div class="container">
        
        <div class="heading-sub">Saved Content</div>
        
        <!-- single content -->
        
        <?php
        
        include("../api/connection.php");
        
        $email = $_SESSION['email'];
        
        $s1 = "select * from save where email='$email'";
        $q1 = mysqli_query($conn,$s1);
        
        while($r1=mysqli_fetch_assoc($q1)){
            
            $contentIDMatchQuick = $r1['contentID'];
            
            $s2 = "select * from quickRead where contentID='$contentIDMatchQuick'";
            $q2 = mysqli_query($conn, $s2);
            if(mysqli_num_rows($q2)>0){
                $r2 = mysqli_fetch_assoc($q2);
        ?>
        <div class="read-page-content-container">
            
            <div class="view">
                <div class="content-id"><?php echo $r2['contentID']; ?></div>
                <div class="read-page-title"><?php echo $r2['title']; ?></div>
                <div class="read-page-description"><?php echo $r2['description']; ?></div>
            </div>
            
            <div class="read-page-btns">
                <div class="content-id"><?php echo $r2['contentID']; ?></div>
                <div class="read-page-save-text">Saved</div>
                <div class="read-page-save-btn material-icons" style="font-size: 15px;">bookmark</div>
            </div>
            
        </div>
        
        <?php }} ?>
        <div class="email"><?php echo $email; ?></div>
        <?php
        
        
        $s3 = "select * from save where email='$email'";
        $q3 = mysqli_query($conn,$s3);
        
        while($r3=mysqli_fetch_assoc($q3)){
            
            $contentIDMatchLearn = $r3['contentID'];
            
            $s4 = "select * from learnMode where contentID='$contentIDMatchLearn'";
            $q4 = mysqli_query($conn, $s4);
            if(mysqli_num_rows($q4)>0){
                $r4 = mysqli_fetch_assoc($q4);
        ?>
        
        <div class="read-page-content-container">
            
            <div class="view">
                <div class="content-id"><?php echo $r4['contentID']; ?></div>
                <div class="read-page-title"><?php echo $r4['title']; ?></div>
                <div class="read-page-description"><?php echo $r4['description']; ?></div>
            </div>
            
            <div class="read-page-btns">
                <div class="content-id"><?php echo $r4['contentID']; ?></div>
                <div class="read-page-save-text">Saved</div>
                <div class="read-page-save-btn material-icons" style="font-size: 15px;">bookmark</div>
            </div>
            
        </div>
        
        <?php }} ?>
        
        
    </div>
    
    <div class="toast">Please choose content file!</div>
    
    <!-- bottom menu -->
    <?php include("../resources/bottom.php"); ?>
    
    <script>
    
        // changing the header heading
        $(".header-logo").text("save");
        
        // on click on content open content on view page
        $(".view").on("click",function(){
            let contentID = $(this).find(".content-id").text();
            window.location.href = "../view/?read="+contentID;
        });
        
        // to save and unsave content
        $(".read-page-btns").on("click",function(){
            let value = $(this).find(".read-page-save-text").text();
            
            if(value==="Saved"){
                $(this).find(".read-page-save-text").text("Unsaved");
                $(this).find(".read-page-save-btn").css("color","#000");
                $(".toast").text("Content unsaved.").slideDown();
                setTimeout(function() {
                    $(".toast").slideUp();
                }, 3000);
            }else{
                $(this).find(".read-page-save-text").text("Saved");
                $(this).find(".read-page-save-btn").css("color","#E74C3C");
                $(".toast").text("Content saved.").slideDown();
                setTimeout(function() {
                    $(".toast").slideUp();
                }, 3000);
            }
        })
        
        $(".read-page-btns").on("click",function(){
            var email = $(".email").text();
            var contentID = $(this).find(".content-id").text();
            
            $.ajax({
                url:'unsave.php',
                type:'POST',
                data:{
                    email:email,
                    contentID:contentID
                },
                success:function(response){
                    if(response==10){
                        $(".toast").text("Content unsaved!").slideDown();
                        setTimeout(function() {
                            $(".toast").slideUp();
                            location.reload();
                        }, 3000);
                        return;
                    }else{
                        $(".toast").text("Something went wrong. Try Again!").slideDown();
                        setTimeout(function() {
                            $(".toast").slideUp();
                        }, 3000);
                    }
                }
            })
        })
        
    </script>
    
    </div>
</div>
    
</body>

</html>