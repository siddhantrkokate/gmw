
<?php
    
    $contentID = $_GET['contentID'];

    session_start();

    if(isset($_SESSION["email"]) && isset($_SESSION["password"])){

    }else{
        header("Location: ../../home");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Module - Guide Me Web</title>
    
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
        
        .heading{
            text-align: center;
            margin-top: 40%;
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
            transition: background-color 0.3s ease-in;
        }
        
        .close-btn:hover{
            background-color: #EAECEE;
        }
        
        .content-id{
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
            
            <div class="heading">Create new Module</div>
            
            <div class="form-container">
                <input type="text" placeholder="Enter module name..." class="input-fild module-name poppins-regular">
                <div class="save-btn">Save</div>
                <div class="close-btn">close</div>
            </div>

        </div>
    </div>
    
    <div class="toast"></div>
    
    <div class="content-id"><?php echo $contentID; ?></div>
    
    <script>
        
        var contentID = $(".content-id").text();
        
        
        $(".close-btn").on("click",function(){
            history.back();
        });
        
        function showToastMessage(message) {
                    $(".toast").text(message).slideDown();
                    setTimeout(function () {
                        $(".toast").slideUp();
                    }, 3000);
                }
        
        $(".save-btn").on("click",function(){
            var moduleName = $(".module-name").val();
            
            if(moduleName.length<1){
                    showToastMessage("Please enter valid module name.");
                    return;
            }else if(moduleName.length>40){
                    showToastMessage("Module name should not be more than 40 characters.");
                    return;
            }else{
                $.ajax({
                url:'create-module-backend.php',
                type:'POST',
                data:{
                    moduleName:moduleName,
                    contentID:contentID
                },
                success:function(response){
                    console.log(response);
                    if(response==10){
                        window.location.href = "../module/index.php?contentID="+contentID;
                    }else{
                        showToastMessage("Something went wrong! Try again.");
                    }
                }
            })
            }
        })
        
        
    </script>

</body>

</html>