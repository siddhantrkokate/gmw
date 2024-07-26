<?php

    session_start();
        
    if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
            
    }else{
        header("location: ../auth/index.php");
    }
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Content - Guide Me Web</title>
    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- css -->
    <!--<link rel="stylesheet" href="style.css">-->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FFF;
            color: #000;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /*height: 100vh;*/
        }

        /* poppins google font */
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        
        /* header */
        .header{
            padding: 20px;
            display: flex;
            flex-direction: row;
            position: fixed;
            top: 0px;
            width: 100%;
            box-sizing: border-box;
            color: #000;
            background-color: #FFF;
        }
        
        .header-heading{
            margin-right: auto;
        }
        
        .header-close-button{
            margin-left: auto;
            cursor: pointer;
        }
        
        .container{
            margin-top: 50%;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        
        .heading-con{
            color: #ABB2B9;
            font-size: 11px;
            text-align: center;
            margin-bottom: 15px;
        }
        
        .button-con{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }
        
        .button{
            padding: 15px;
            width: calc(100% - 40px);
            text-align: center;
            font-size: 12px;
            border-radius: 56px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        
        .quick-read,.learn-mode{
            border: 0.1px solid #000;
            background-color: #000;
            color: #fff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .quick-read:hover{
            background-color: #FFF;
            color: #000;
        }
        
        .learn-mode:hover{
            background-color: #FFF;
            color: #000;
        }
        
        @media screen and (min-width: 1300px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .header{
                width: 40%;
            }
            
            .screen{
                width: 40%;
            }
            
            .container{
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
            
            .header{
                width: 60%;
            }
            
            .screen{
                width: 60%;
            }
            
            .container{
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
            
            .header{
                width: 70%;
            }
            
            .screen{
                width: 70%;
            }
            
            .container{
                width: 70%;
            }
        }
    </style>
    
</head>

<body class="poppins-regular">
    
    <div class="main-screen">
    <div class="screen">
    
    
    <!-- header -->
    
    <div class="header">
        <div class="header-heading"></div>
        <div class="header-close-button material-icons" title="Discard">close</div>
    </div>
    
    
    <div class="container">
        
        <div class="button-con">
            <div class="button quick-read">Add Quick Read</div>
            <div class="button learn-mode">Create in Learn Mode</div>
        </div>
        
        <div class="heading-con">Select content type want to upload*</div>
    </div>
    
    
    </div>
</div>
    
    <script>
            
            $(".header-close-button").on("click",function(){
                history.back();
            })
    
            $(".quick-read").on("click", function() {
                window.location.href = "quick-read/index.php";
            });
            
            $(".learn-mode").on("click", function() {
                window.location.href = "learn-mode/index.php";
            });
    </script>
    
    
    
</body>

</html>