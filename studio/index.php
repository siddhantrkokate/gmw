<?php

    // Server
    include("../api/connection.php");
    
    // session
    session_start();

    if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
        $email = $_SESSION["email"];
        $password = $_SESSION["password"];
    
        $s1 = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password'";
        $q1 = mysqli_query($conn, $s1);
    
        if (mysqli_num_rows($q1) > 0) {
            $r1 = mysqli_fetch_assoc($q1);
        } else {
            echo "Invalid email or password.";
        }
    } else {
        header("Location: ../profile");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio - Guide Me Web</title>
    
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
            margin: 20px;
        }

        /* content slide container single */
        .read-page-content-container {
            border: 1px solid #E6E6E6;
            width: 100%;
            box-sizing: border-box;
            cursor: pointer;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        /* content title */
        .read-page-title {
            padding: 15px 20px 10px 20px;
            font-size: 15px;
        }

        /* conent description */
        .read-page-description {
            font-size: 13px;
            color: #999;
            padding: 5px 20px;
        }

        /* content assets container */
        .read-page-assets-container {
            display: flex;
            flex-direction: row;
            margin-top: 10px;
        }

        /* content assets items */
        .read-page-assets-item {
            width: calc(100%/2);
            padding: 10px;
            color: #5D6D7E;
            font-size: 12px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border: 0.1px solid #E6E6E6;
        }

        .read-page-assets-icon {
            margin-left: 10px;
            margin-top: -2px;
        }

        /* content ID */
        .content-id {
            display: none;
        }

        /* content btns container [edit/delete/view] */
        .read-page-btns-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background-color: white;
            width: 100%;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        
        .read-page-btn {
            padding: 12px;
            width: calc(100%/2);
            text-align: center;
            font-size: 18px;
            background-color: #EAECEE;
            color: #000;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease-in;
        }

        .read-page-btn:hover {
            background-color: #000;
            color: #FFF;
            border-radius: 5px;
        }

        .left-asset {
            border-left: 0px solid red;
            border-right: 0px solid red;
        }

        .right-asset {
            border-right: 0px solid red;
        }

        .read-page-edit-icon {
            border-right: 1px solid #D3D3D3;
            border-bottom-left-radius: 5px;
        }

        .read-page-delete-icon {
            border-bottom-right-radius: 5px;
        }

        /* switch */
        .switch-primary-container {
            position: sticky;
            top: 0;
            background-color: #FFF;
            border-bottom: 0.1px solid #ddd;
            padding-top: 5px;
            margin-bottom: 20px;
        }

        .switch-container {
            background-color: #EAECEE;
            display: flex;
            flex-direction: row;
            width: 100%;
            border-radius: 5px;
            margin-bottom: 15px;
            margin-top: 15px;
        }

        .switch-item {
            width: calc(100%/2);
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px;
            font-size: 13px;
            border-radius: 5px;
            cursor: pointer;
        }

        .active-switch {
            background-color: #000;
            color: #fff;
        }

        /* quick read */
        .quick-read-content {
            margin-bottom: 100px;
        }

        /* learn mode */
        .learn-mode-content {
            margin-bottom: 100px;
            display: none;
        }

        /* content button container */
        .content-btn-container {
            display: flex;
            flex-direction: row;
            background-color: #EAECEE;
        }

        /* content button */
        .content-btn {
            width: calc(100%/3);
            padding: 13px;
            text-align: center;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease-in;
        }

        .content-btn:hover {
            background-color: #000;
            color: #fff;
            border-radius: 5px;
        }

        .content-btn-text {
            font-size: 12px;
            margin-right: 10px;
        }

        .right-border {
            border-right: 0.1px solid #D3D3D3;
        }

        .toast {
            background-color: #424949;
            color: #FFF;
            margin: 20px;
            position: fixed;
            bottom: 0;
            margin-bottom: 90px;
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

            <!-- header -->
            <?php include ("../resources/header.php"); ?>

            <!-- content -->
            <div class="container">

                <div class="switch-primary-container">
                    <div class="switch-container">
                        <div class="switch-item active-switch quick-read" title="Switch to Quick Read">Quick Read</div>
                        <div class="switch-item learn-mode" title="Switch to Learn Mode">Learn Mode</div>
                    </div>
                </div>

                <!-- quick read content -->
                <div class="quick-read-content">

                    <?php
                    $userID = $r1["user_id"];
                    $s2 = "select * from quickRead WHERE userID='$userID'";
                    $q2 = mysqli_query($conn, $s2);

                    while ($r2 = mysqli_fetch_assoc($q2)) {



                        ?>
                        <div class="read-page-content-container" title="View: <?php echo $r2['title']; ?>">
                            <div class="view">
                                <div class="content-id"><?php echo $r2['contentID']; ?></div>
                                <div class="read-page-title"><?php echo $r2['title']; ?></div>
                                <div class="read-page-description"><?php echo $r2['description']; ?></div>
                            </div>

                            <div class="read-page-assets-container">
                                <div class="read-page-assets-item left-asset">
                                    <div class="read-page-assets-text"><?php echo $r2['contentLike']; ?></div>
                                    <div class="read-page-assets-icon material-icons" style="font-size: 15px">thumb_up</div>
                                </div>
                                <div class="read-page-assets-item right-asset">
                                    <div class="read-page-assets-text"><?php echo $r2['contentViews']; ?></div>
                                    <div class="read-page-assets-icon material-icons" style="font-size: 15px">visibility
                                    </div>
                                </div>
                            </div>

                            <div class="read-page-btns-container">
                                <div class="read-page-btn read-page-edit-icon" title="Click to make the changes.">
                                    <div class="content-btn-text">Update Content</div>
                                    <div class="material-icons" style="font-size: 15px;">edit</div>
                                    <div class="content-id"><?php echo $r2['contentID']; ?></div>
                                </div>
                                <div class="read-page-btn read-page-delete-icon" title="Remove post completely.">
                                    <div class="content-btn-text">Delete</div>
                                    <div class="material-icons" style="font-size: 15px;color:red;">delete</div>
                                    <div class="content-id"><?php echo $r2['contentID']; ?></div>
                                </div>
                            </div>

                        </div>

                        <?php

                    }

                    ?>
                </div>


                <!-- learn mode content -->
                <div class="learn-mode-content">

                    <?php

                    $s4 = "select * from learnMode WHERE userID='$userID'";
                    $q4 = mysqli_query($conn, $s4);

                    while ($r4 = mysqli_fetch_assoc($q4)) {

                        ?>

                        <div class="read-page-content-container">
                            <div class="view">
                                <div class="content-id"><?php echo $r4['contentID']; ?></div>
                                <div class="read-page-title"><?php echo $r4['title']; ?></div>
                                <div class="read-page-description"><?php echo $r4['description']; ?></div>
                            </div>

                            <div class="read-page-assets-container">
                                <div class="read-page-assets-item left-asset">
                                    <div class="read-page-assets-text"><?php echo $r4['contentLike']; ?></div>
                                    <div class="read-page-assets-icon material-icons" style="font-size: 15px">thumb_up</div>
                                </div>
                                <div class="read-page-assets-item right-asset">
                                    <div class="read-page-assets-text"><?php echo $r4['contentViews']; ?></div>
                                    <div class="read-page-assets-icon material-icons" style="font-size: 15px">visibility
                                    </div>
                                </div>
                            </div>

                            <div class="content-btn-container">
                                <div class="content-btn right-border edit-learn-mode" title="Make changes in basic details.">
                                    <div class="content-id"><?php echo $r4['contentID']; ?></div>
                                    <div class="content-btn-text">Basic Details</div>
                                    <div class="material-icons" style="font-size: 15px;">edit</div>
                                </div>
                                <div class="content-btn right-border delete-learn-mode-post" title="Remove the post.">
                                    <div class="content-id"><?php echo $r4['contentID']; ?></div>
                                    <div class="content-btn-text">Delete</div>
                                    <div class="material-icons" style="font-size: 15px;color:red;">delete</div>
                                </div>
                                <div class="content-btn modules-learn-mode" title="View modules.">
                                    <div class="content-id"><?php echo $r4['contentID']; ?></div>
                                    <div class="content-btn-text">Modules</div>
                                    <div class="material-icons" style="font-size: 18px;">fullscreen</div>
                                </div>
                            </div>

                        </div>

                        <?php

                    }

                    ?>
                </div>

            </div>

            <div class="toast">HEllo</div>

            <!-- bottom menu -->
            <?php include ("../resources/bottom.php"); ?>

            <script>

                // changing the header heading
                $(".header-logo").text("studio");

                // on click on content open content on view page
                $(".view").on("click", function () {
                    let contentID = $(this).find(".content-id").text();
                    window.location.href = "../view/?read=" + contentID;
                });

                // on click on edit btn open content edit
                $(".read-page-edit-icon").on("click", function () {
                    let contentID = $(this).find(".content-id").text();
                    window.location.href = "../studio/quick-read/update.php?contentID=" + contentID;
                });

                $(".learn-mode").on("click", function () {
                    $(this).addClass("active-switch");
                    $(".quick-read").removeClass("active-switch");
                    $(".learn-mode-content").slideDown();
                    $(".quick-read-content").slideUp();
                })

                $(".quick-read").on("click", function () {
                    $(this).addClass("active-switch");
                    $(".learn-mode").removeClass("active-switch");
                    $(".quick-read-content").slideDown();
                    $(".learn-mode-content").slideUp();
                })

                function showToastMessage(message) {
                    $(".toast").text(message).slideDown();
                    setTimeout(function () {
                        $(".toast").slideUp();
                    }, 3000);
                }

                $(".read-page-delete-icon").on("click", function () {
                    var contentID = $(this).find(".content-id").text();
                    $.ajax({
                        url: 'quick-read/delete.php',
                        type: 'POST',
                        data: {
                            contentID: contentID
                        },
                        success: function (response) {
                            console.log(response);
                            if (response == "done") {
                                showToastMessage("Something went wrong while delering post.");
                            } else {
                                showToastMessage("Post removed.");
                                location.reload();
                            }
                        }
                    })
                })

                $(".delete-learn-mode-post").on("click", function () {
                    var contentID = $(this).find(".content-id").text();
                    $.ajax({
                        url: 'learn-mode/delete.php',
                        type: 'POST',
                        data: {
                            contentID: contentID
                        },
                        success: function (response) {
                            console.log(response);
                            if (response == "done") {
                                showToastMessage("Something went wrong while delering post.");
                            } else {
                                showToastMessage("Post removed.");
                                location.reload();
                            }
                        }
                    })
                })

                $(".modules-learn-mode").on("click", function () {
                    let contentID = $(this).find(".content-id").text();
                    window.location.href = "../studio/learn-mode/module/index.php?contentID=" + contentID;
                });

                $(".edit-learn-mode").on("click", function () {
                    let contentID = $(this).find(".content-id").text();
                    window.location.href = "../studio/learn-mode/basic-details/index.php?contentID=" + contentID;
                });

            </script>

        </div>
    </div>

</body>

</html>