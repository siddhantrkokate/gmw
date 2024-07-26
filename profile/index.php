<?php

// session start
session_start();

// Check if the email and password are set in the session
$email = "";
if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
    $email = $_SESSION["email"];
} else {
    // The user is not logged in, redirect to the login page
    header("Location: ../auth/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- basic meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Guide Me Web</title>

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
        /* poppins google font */
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        /* page container */
        .container {
            padding: 80px 20px 40px 20px;
        }

        .profile-picture-container {
            display: flex;
            flex-direction: column;
            margin-top: 80px;
            width: 110px;
            height: 110px;
            background-color: #EAECEE;
            color: #ffffff;
            border: 0.1px solid #FFF;
            border-radius: 50%;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
        }

        .person-icon {
            color: #2C3E50;
        }

        .basic-data-container {
            border: 0.1px solid #ABB2B9;
            color: #999999;
            padding: 15px;
            border-radius: 5px;
        }

        .basic-data-lable {
            font-size: 15px;
            color: #000;
        }

        .basic-data {
            margin-top: 10px;
            font-size: 13px;
        }

        .sign-out-btn {
            border: 0.1px solid #000;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
            width: 100%;
            font-size: 14px;
            background-color: #000;
            color: white;
            box-sizing: border-box;
        }
        
        @media screen and (min-width: 900px){
            
            .main-screen {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
        }

        @media screen and (min-width: 1300px) {

            .screen {
                width: 40%;
            }
            
        }

        @media screen and (min-width: 1100px) and (max-width: 1299px) {
            
            .screen {
                width: 60%;
            }
            
        }

        @media screen and (min-width: 900px) and (max-width: 1099px) {

            .screen {
                width: 70%;
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

                <center>
                    <div class="profile-picture-container">
                        <div class="material-icons person-icon" style="font-size: 60px;">person</div>
                    </div>
                </center>

                <div class="basic-data-container">
                    <div class="basic-data-lable">Email</div>
                    <div class="basic-data"><?php echo $email; ?></div>
                </div>

                <div class="sign-out-btn">Sign out</div>
            </div>

            <!-- bottom menu -->
            <?php include ("../resources/bottom.php"); ?>

            <script>

                // changing the header heading
                $(".header-logo").text("Profile");
                $(".sign-out-btn").on("click", function () {
                    window.location.href = "../api/logout.php";
                })
            </script>

        </div>
    </div>

</body>

</html>