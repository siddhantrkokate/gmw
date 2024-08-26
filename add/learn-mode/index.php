<!DOCTYPE html>
<html lang="en">

<?php

    session_start();

    if(isset($_SESSION["email"]) && isset($_SESSION["password"])){

    }else{
        header("Location: ../../home");
        exit();
    }
?>

<head>

    <!-- basic meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Space to Add Learn Mode Content - Guide Me Web</title>

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

        /* header */
        .header {
            padding: 20px;
            display: flex;
            flex-direction: row;
            position: fixed;
            top: 0px;
            width: 100%;
            box-sizing: border-box;
            color: #000;
            background-color: #FFF;
            border-bottom: 0.1px solid #E6E6E6;
        }

        .header-heading {
            margin-right: auto;
        }

        .header-close-button {
            margin-left: auto;
            cursor: pointer;
        }

        /* input box */
        .input-container {
            margin: 20px;
            margin-bottom: 20px;
        }

        .input-heading {
            font-size: 13px;
            color: #757575;
            padding-bottom: 10px;
        }

        .input-heading-special {
            margin: 20px;
            padding-bottom: 0px;
            margin-bottom: -12px;
        }

        .input-box {
            width: 100%;
            box-sizing: border-box;
            padding: 20px;
            background-color: #EAECEE;
            color: #000;
            border: 0px solid red;
            border-radius: 5px;
            outline: none;
        }

        /* title */
        .title-box {
            margin-top: 100px;
        }

        /* upload file selector */
        .upload-container {
            margin: 20px;
            border: 1px solid #B0B0B0;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            position: relative;
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

        /* content status */
        .content-status-container {
            margin: 20px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .content-status-items {
            width: 100%;
            display: flex;
            flex-direction: row;
            padding: 10px;
            border: 1px solid #E6E6E6;
            box-sizing: border-box;
            margin-bottom: 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .content-status-icon {
            font-size: 20px;
            margin-left: auto;
        }

        .schedule-time-container {
            margin: 20px;
            display: none;
        }

        .schedule-date-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 10px;
            align-items: center;
        }

        .selector {
            width: calc(100%/2);
            border: 0.1px solid #E6E6E6;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
            margin-bottom: 5px;
            outline: none;
            background-color: #E6E6E6;
            color: #000;
        }

        .content-access-description {
            margin: 20px;
            font-size: 12px;
            margin-top: -20px;
            display: none;
            color: #757575;
        }

        /* save button */
        .save-btn {
            margin: 20px;
            padding: 12px;
            width: calc(100% - 40px);
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #000;
            color: white;
            text-align: center;
            font-size: 14px;
            cursor: pointer;
            border: 0.1px solid #000;
            margin-bottom: 30px;
            transition: background-color 0.5s ease, color 0.5s ease;
        }
        
        .save-btn:hover{
            background-color: #FFF;
            color: #000;
        }

        .toast {
            position: fixed;
            bottom: 0;
            margin-bottom: 60px;
            margin: 20px;
            padding: 15px 20px 15px 20px;
            background-color: red;
            color: white;
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

            .header {
                width: 40%;
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

            .header {
                width: 60%;
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

            .header {
                width: 70%;
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


            <!-- header -->

            <div class="header">
                <div class="header-heading">Create in Learn Mode</div>
                <div class="header-close-button material-icons" title="Discard">close</div>
            </div>

            <!-- title -->
            <div class="input-container title-box">
                <div class="input-heading">Content Title*</div>
                <input type="text" placeholder="Enter here.." autocomplete="off"
                    class="poppins-regular input-box title">
            </div>

            <!-- description -->
            <div class="input-container">
                <div class="input-heading">Content Description*</div>
                <textarea class="input-box poppins-regular description" placeholder="Enter here.." rows="3"></textarea>
            </div>

            <!-- content status -->
            <div class="input-heading input-heading-special">Content Status*</div>

            <!-- content status list -->
            <div class="content-status-container">

                <div class="content-status-items">
                    <div class="content-status-text">Public</div>
                    <div class="content-status-icon material-icons">public</div>
                </div>

                <div class="content-status-items">
                    <div class="content-status-text">Private</div>
                    <div class="content-status-icon material-icons">lock</div>
                </div>

                <div class="content-status-items">
                    <div class="content-status-text">Link Only</div>
                    <div class="content-status-icon material-icons">link</div>
                </div>

                <div class="content-status-items">
                    <div class="content-status-text">Schedule</div>
                    <div class="content-status-icon material-icons">schedule</div>
                </div>
            </div>

            <!-- schedule content date and time picker -->
            <div class="schedule-time-container">

                <div class="input-heading">Set Time and Date to Schedule Content Publishing:</div>

                <div class="schedule-date-container">
                    <input type="date" id="datePicker" class="poppins-regular date selector" name="datePicker"
                        value="date" style="margin-right:2.5px;">
                    <input type="time" id="timePicker" class="poppins-regular time selector" name="timePicker"
                        style="margin-left:2.5px;">
                </div>

            </div>

            <!-- save btn -->
            <div class="save-btn">Create a Space</div>

            <!-- toast -->
            <div class="toast">Please choose content file!</div>

            <script>

                // Function: Style and the schedule function shower
                let status = "";
                $(".content-status-items").on("click", function () {
                    $(".content-status-items").css({
                        "background-color": "transparent",
                        "color": "#000"
                    });

                    let contentStatus = $(this).find(".content-status-text").text();

                    status = contentStatus;
                    $(this).css({
                        "background-color": "#000",
                        "color": "#FFF"
                    });

                    if (contentStatus === "Schedule") {
                        $(".schedule-time-container").slideDown();
                    } else {
                        if ($(".schedule-time-container").is(':visible')) {
                            $(".schedule-time-container").slideUp();
                        } else {
                            $(".schedule-time-container").hide();
                        }
                    }
                });

                // Date and Time
                document.addEventListener('DOMContentLoaded', function () {
                    const today = new Date();
                    const todayStr = today.toISOString().split('T')[0];
                    document.getElementById('datePicker').setAttribute('min', todayStr);
                    const maxDate = new Date();
                    maxDate.setDate(today.getDate() + 60);
                    const maxDateStr = maxDate.toISOString().split('T')[0];
                    document.getElementById('datePicker').setAttribute('max', maxDateStr);
                    const hours = today.getHours().toString().padStart(2, '0');
                    const minutes = today.getMinutes().toString().padStart(2, '0');
                    document.getElementById('timePicker').setAttribute('value', `${hours}:${minutes}`);
                });

                // Assuming you have some way to trigger this validation, like a button click
                $('.save-btn').on('click', function () {
                    var title = $('.title').val();
                    var description = $('.description').val();
                    var contentStat = status; // Ensure 'status' is defined somewhere in your code
                    var time = $('.time').val();
                    var date = $('.date').val();

                    // Validation checks
                    if (title.length > 80) {
                        showToastMessage("The title must not exceed 80 characters.");
                        return;
                    } else if (title.length == 0) {
                        showToastMessage("Please enter a title.");
                        return;
                    } else if (description.length > 300) {
                        showToastMessage("The description must not exceed 300 characters.");
                        return;
                    } else if (description.length == 0) {
                        showToastMessage("Please enter a description.");
                        return;
                    } else if (contentStat === "") {
                        showToastMessage("Please select content status.");
                        return;
                    } else if (contentStat === "Schedule") {
                        if (time === "") {
                            showToastMessage("Please select a specific time.");
                            return;
                        } else if (date === "") {
                            showToastMessage("Please select a date for upload.");
                            return;
                        }
                    }

                    $.ajax({
                        url: 'backend.php',
                        type: 'POST',
                        data: {
                            title: title,
                            description: description,
                            status: contentStat,
                            time: time,
                            date: date
                        },
                        success: function (response) {
                            if (response == "New record created successfully") {
                                $(".toast").text("Uploaded Successfully!").slideDown().css("background-color", "green");
                                setTimeout(function () {
                                    $(".toast").slideUp().css("background-color", "red");
                                }, 3000);
                            } else {
                                window.location.href = "../../extra/success.php?text=Content Space Ready! 🚀 Head to the studio to add and update your modules and topics.";
                            }
                        }
                    })

                    $(".toast").text("Uploaded Successfully!").slideDown().css("background-color", "green");
                    setTimeout(function () {
                        $(".toast").slideUp().css("background-color", "red");
                    }, 3000);


                    function showToastMessage(message) {
                        $(".toast").text(message).slideDown();
                        setTimeout(function () {
                            $(".toast").slideUp();
                        }, 3000);
                    }
                });

                $(".header-close-button").on("click", function () {
                    history.back();
                })

            </script>

        </div>
    </div>





</body>

</html>