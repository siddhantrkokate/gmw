<?php
include("../../../api/connection.php");

session_start();

if (isset($_GET['contentID']) && isset($_GET['moduleID'])) {
    $contentID = $_GET['contentID'];
    $moduleID = $_GET['moduleID'];

    if (isset($_SESSION["email"])) {
        // Use prepared statements for security
        $stmt = $conn->prepare("SELECT * FROM `$contentID` WHERE moduleID = ?");
        $stmt->bind_param("s", $moduleID);
        $stmt->execute();
        $resultContent = $stmt->get_result()->fetch_assoc();
        $stmt->close();
    } else {
        header("Location: ../../../profile");
        exit();
    }
} else {
    header("Location: ../../../home");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Basic Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - Module - Guide Me Web</title>
    
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

        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .heading {
            text-align: center;
            margin-top: 40%;
            font-size: 16px;
            margin-bottom: 40px;
        }

        .form-container {
            margin: 20px;
        }

        .input-field {
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
            margin-top: 20px;
            cursor: pointer;
            border: 0.1px solid #000;
            transition: background-color 0.3s ease-in;
        }
        
        .save-btn:hover{
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
        
        .content-id{
            display: none;
        }
        
        .module-id{
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
            <div class="heading">Edit Module</div>
            <div class="form-container">
                <input type="text" placeholder="Module name..." value="<?php echo htmlspecialchars($resultContent['moduleName']); ?>" class="input-field module-name poppins-regular">
                <div class="save-btn">Save</div>
                <div class="close-btn">Close</div>
            </div>
            <div class="toast"></div>
        </div>
    </div>
    

    <div class="content-id"><?php echo htmlspecialchars($contentID); ?></div>
    <div class="module-id"><?php echo htmlspecialchars($moduleID); ?></div>

    <script>
        var contentID = $(".content-id").text();
        var moduleID = $(".module-id").text();

        $(".close-btn").on("click", function () {
            window.location.href = "index.php?contentID=" + contentID;
        });
        
        function showToastMessage(message) {
            $(".toast").text(message).slideDown();
                    setTimeout(function () {
                        $(".toast").slideUp();
                    }, 3000);
                }
                
        $(".save-btn").on("click",function(){
            var name = $(".module-name").val();
            
            if(name==""){
                showToastMessage("Please enter module name.");
                return;
            }else if(name.length>40){
                showToastMessage("Module name should not be more than 40 chars.");
                return;
            }
            
            $.ajax({
                url:'update-module-backend.php',
                type:'POST',
                data:{
                    contentID:contentID,
                    moduleID:moduleID,
                    moduleName:name
                },
                success:function(response){
                    if(response==10){
                        showToastMessage("Module Name Updated!");
                        return;
                    }else{
                        showToastMessage("Somethings went wrong. Try again!");
                        return;
                    }
                }
            })
        })
        
    </script>
</body>

</html>