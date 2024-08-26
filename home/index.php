<?php

    // server connection
    include("../api/connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Guide Me Web</title>

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- CSS -->
    <style>
    
        /* poppins google font */
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        /* Main Logo */
        .main-logo {
            font-size: 19px;
            text-align: center;
            margin-top: 80px;
            padding-bottom: 40px;
        }

        /* Search Container */
        .search-container {
            margin: 20px 20px 10px 20px;
            display: flex;
            border: 2px solid #EAECEE;
            background-color: #EAECEE;
            border-radius: 5px;
        }

        .search-icon {
            cursor: pointer;
        }

        .search-icon-left {
            margin: 15px 10px 15px 20px;
            cursor: pointer;
        }

        .search-icon-right {
            margin: 15px 20px 15px 10px;
            cursor: pointer;
        }

        .search-box {
            border: none;
            outline: none;
            background-color: #EAECEE;
            font-size: 17px;
            width: 100%;
            cursor: pointer;
        }

        /* Content Switch */
        .switch-primary-container {
            position: sticky;
            top: 0px;
            padding: 5px 0px;
            background-color: #FFF;
            border-bottom: 0.1px solid #ddd;
        }

        .switch-container {
            margin: 10px 20px;
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            background-color: #EBEDEF;
        }

        .switch-item {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .active-switch {
            background-color: #000;
            color: #FFF;
        }

        /* Content Container */
        .content-container {
            margin: 30px 20px 100px 20px;
        }

        .content {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .content:hover {
            background-color: #EBEDEF;
        }

        .content-title {
            padding: 15px 20px 10px 20px;
            color: #000;
            font-size: 15px;
        }

        .content-description {
            font-size: 13px;
            color: #999;
            padding: 0px 20px 20px 20px;
        }

        .content-assets-container {
            display: flex;
        }

        .content-asset {
            flex: 1;
            padding: 10px;
            color: #5D6D7E;
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 0.1px solid #EBEDEF;
            border-bottom: 0px solid red;
        }

        .content-asset-icon {
            margin: 0px 0px 0px 10px;
        }

        .content-id {
            display: none;
        }

        .left-asset {
            border-left: 0px solid red;
        }

        .right-asset {
            border-right: 0px solid red;
        }

        .tag {
            margin-left: auto;
            width: 70px;
            font-size: 10px;
            padding: 5px 20px;
            background-color: #000;
            color: #fff;
            border: 0.1px solid #000;
            border-bottom-left-radius: 15px;
            border-top-right-radius: 5px;
            z-index: 0;
            text-align: center;
        }

        .q-mod {
            background-color: #FFF;
            color: #000;
            border: 0px solid red;
            border-bottom: 1px solid #ddd;
            border-left: 1px solid #ddd;
        }

        .quick-read,.learn-mode {
            display: none;
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

            <!-- Header -->
            <?php include ("../resources/header.php"); ?>

            <!-- Main Logo -->
            <div class="main-logo">Welcome Back!</div>
            <div class="main-logo" style="display: none;">Looking for something new?</div>
            <div class="main-logo" style="display: none;">Need quick insights?</div>
            <div class="main-logo" style="display: none;">Explore our Quick Reads!</div>
            <div class="main-logo" style="display: none;">Get instant PDFs & videos!</div>
            <div class="main-logo" style="display: none;">Fast information at your fingertips!</div>
            <div class="main-logo" style="display: none;">Want to dive deeper?</div>
            <div class="main-logo" style="display: none;">Switch to Learn Mode!</div>
            <div class="main-logo" style="display: none;">Discover structured learning!</div>
            <div class="main-logo" style="display: none;">Explore modules & topics!</div>
            <div class="main-logo" style="display: none;">In-depth content for mastery!</div>
            <div class="main-logo" style="display: none;">Master topics with comprehensive modules!</div>
            <div class="main-logo" style="display: none;">From Team Guide Me</div>
            <div class="main-logo" style="display: none;">Thanks for exploring with us!</div>
            <div class="main-logo" style="display: none;">Welcome Back, Knowledge Seeker!</div>
            <div class="main-logo" style="display: none;">Excited to explore our offerings?</div>
            <div class="main-logo" style="display: none;">Need quick updates?</div>
            <div class="main-logo" style="display: none;">Start with our Quick Reads menu!</div>
            <div class="main-logo" style="display: none;">Instantly access articles & videos!</div>
            <div class="main-logo" style="display: none;">Get concise information in no time!</div>
            <div class="main-logo" style="display: none;">Looking for more depth?</div>
            <div class="main-logo" style="display: none;">Switch to our Learn Mode menu!</div>
            <div class="main-logo" style="display: none;">Engage with detailed modules & topics!</div>
            <div class="main-logo" style="display: none;">Immerse yourself in comprehensive content!</div>
            <div class="main-logo" style="display: none;">Achieve mastery with structured paths!</div>
            <div class="main-logo" style="display: none;">Explore a world of knowledge in depth!</div>
            <div class="main-logo" style="display: none;">From the Guide Me Team</div>
            <div class="main-logo" style="display: none;">We appreciate your curiosity and dedication!</div>

            <!-- Search Container -->
            <div class="search-container">
                <div class="search-icon search-icon-left material-icons">search</div>
                <input type="text" placeholder="Search.." class="search-box poppins-regular" autocomplete="off"
                    title="search by text">
                <div class="search-icon search-icon-right material-icons" title="search with your voice">mic</div>
            </div>

            <!-- Content Switch -->
            <div class="switch-primary-container">
                <div class="switch-container">
                    <div class="switch-item active-switch al-switch unified-switch">Unified</div>
                    <div class="switch-item users-switch quick-read-switch" title="Experiance single page contents.">
                        Quick Read</div>
                    <div class="switch-item users-switch learn-mode-switch" title="Get in-depth information.">Learn Mode
                    </div>
                </div>
            </div>

            <!-- Content Suggestions -->
            <div class="content-container unified">
                <?php

                // selecting contentID and type from unified
                $selectUnified = "SELECT * FROM unified";
                $queryUnified = mysqli_query($conn, $selectUnified);

                while ($resultUnified = mysqli_fetch_assoc($queryUnified)) {

                    $unifiedType = $resultUnified["type"];
                    $unifiedContentID = $resultUnified["contentID"];



                    if ($unifiedType == "quick") {
                        $selectUnifiedQuick = "SELECT * FROM quickRead WHERE contentID='$unifiedContentID'";
                        $queryUnifiedQuick = mysqli_query($conn, $selectUnifiedQuick);

                        $resultUnifiedQuick = mysqli_fetch_assoc($queryUnifiedQuick);

                        if ($resultUnifiedQuick["status"] != "Public") {
                            continue;
                        }

                        ?>
                        <div class="content unified" title="View: <?php echo $resultUnifiedQuick['title']; ?>">
                            <div class="tag q-mod">Quick Read</div>
                            <div class="content-id"><?php echo $resultUnifiedQuick['contentID']; ?></div>
                            <div class="content-title">
                                <?php echo $resultUnifiedQuick['title']; ?>
                            </div>
                            <div class="content-description">
                                <?php echo $resultUnifiedQuick['description']; ?>
                            </div>
                            <div class="content-assets-container">
                                <div class="content-asset left-asset">
                                    <div class="content-asset-text">
                                        <?php echo $resultUnifiedQuick['contentLike']; ?>
                                    </div>
                                    <div class="content-asset-icon material-icons" style="font-size: 13px">thumb_up</div>
                                </div>
                                <div class="content-asset right-asset">
                                    <div class="content-asset-text">
                                        <?php echo $resultUnifiedQuick['contentViews']; ?>
                                    </div>
                                    <div class="content-asset-icon material-icons" style="font-size: 13px">visibility</div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else if ($unifiedType == "learn") {
                        $selectUnifiedLearn = "SELECT * FROM learnMode WHERE contentID='$unifiedContentID'";
                        $queryUnifiedLearn = mysqli_query($conn, $selectUnifiedLearn);


                        $resultUnifiedLearn = mysqli_fetch_assoc($queryUnifiedLearn);

                        if ($resultUnifiedLearn["status"] != "Public") {
                            continue;
                        }
                        ?>
                            <div class="content unified" title="View: <?php echo $resultUnifiedLearn['title']; ?>">
                                <div class="tag">Learn Mode</div>
                                <div class="content-id"><?php echo $resultUnifiedLearn['contentID']; ?></div>
                                <div class="content-title">
                                <?php echo $resultUnifiedLearn['title']; ?>
                                </div>
                                <div class="content-description">
                                <?php echo $resultUnifiedLearn['description']; ?>
                                </div>
                                <div class="content-assets-container">
                                    <div class="content-asset left-asset">
                                        <div class="content-asset-text">
                                        <?php echo $resultUnifiedLearn['contentLike']; ?>
                                        </div>
                                        <div class="content-asset-icon material-icons" style="font-size: 13px">thumb_up</div>
                                    </div>
                                    <div class="content-asset right-asset">
                                        <div class="content-asset-text">
                                        <?php echo $resultUnifiedLearn['contentViews']; ?>
                                        </div>
                                        <div class="content-asset-icon material-icons" style="font-size: 15px">visibility</div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- quick reads -->
            <div class="content-container quick-read">

                <?php
                $selectQuick = "select * from quickRead";
                $queryQuick = mysqli_query($conn, $selectQuick);

                while ($resultQuick = mysqli_fetch_assoc($queryQuick)) {

                    if ($resultQuick["status"] != "Public") {
                        continue;
                    }


                    ?>
                    <div class="content quick-read" title="View: <?php echo $resultQuick["title"]; ?>">
                        <div class="content-id"><?php echo $resultQuick["contentID"]; ?></div>
                        <div class="content-title">
                            <?php echo $resultQuick["title"]; ?>
                        </div>
                        <div class="content-description">
                            <?php echo $resultQuick["description"]; ?>
                        </div>
                        <div class="content-assets-container">
                            <div class="content-asset left-asset">
                                <div class="content-asset-text">
                                    <?php echo $resultQuick["contentLike"]; ?>
                                </div>
                                <div class="content-asset-icon material-icons" style="font-size: 13px">thumb_up</div>
                            </div>
                            <div class="content-asset right-asset">
                                <div class="content-asset-text">
                                    <?php echo $resultQuick["contentViews"]; ?>
                                </div>
                                <div class="content-asset-icon material-icons" style="font-size: 13px">visibility</div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <!-- Learn Mode -->
            <div class="content-container learn-mode">

                <?php
                $selectLearn = "select * from learnMode";
                $queryLearn = mysqli_query($conn, $selectLearn);

                while ($resultLearn = mysqli_fetch_assoc($queryLearn)) {

                    if ($resultLearn["status"] != "Public") {
                        continue;
                    }

                    ?>

                    <div class="content" title="View: <?php echo $resultLearn["title"]; ?>">
                        <div class="content-id"><?php echo $resultLearn["contentID"]; ?></div>
                        <div class="content-title">
                            <?php echo $resultLearn["title"]; ?>
                        </div>
                        <div class="content-description">
                            <?php echo $resultLearn["description"]; ?>
                        </div>
                        <div class="content-assets-container">
                            <div class="content-asset left-asset">
                                <div class="content-asset-text">
                                    <?php echo $resultLearn["contentLike"]; ?>
                                </div>
                                <div class="content-asset-icon material-icons" style="font-size: 13px">thumb_up</div>
                            </div>
                            <div class="content-asset right-asset">
                                <div class="content-asset-text">
                                    <?php echo $resultLearn["contentViews"]; ?>
                                </div>
                                <div class="content-asset-icon material-icons" style="font-size: 13px">visibility</div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>

            <!-- Bottom Menu -->
            <?php include ("../resources/bottom.php"); ?>

        </div>
    </div>

    <!-- JavaScript -->
    <script>
        $(document).ready(function () {

            // $('.header-logo').hide();

            // Navigate to search text page
            $(".search-box").on("click", function () {
                window.location.href = "../search/text/";
            });

            // Navigate to search mic page
            $(".search-icon-right").on("click", function () {
                window.location.href = "../search/mic/";
            });

            // Navigate to home page
            $(".main-logo").on("click", function () {
                window.location.href = "/home";
            });

            // Navigate to content view page
            $(".content").on("click", function () {
                let contentId = $(this).find(".content-id").text();
                window.location.href = "../view/?read=" + contentId;
            });

            // Switch content type
            $(".switch-item").on("click", function () {
                $(".switch-item").removeClass("active-switch");
                $(this).addClass("active-switch");
            });

            $(".user-uploaded").hide();

            $(".al-switch").on("click", function () {
                $(".user-uploaded").hide();
                $(".al-uploaded").show();
            })

            $(".user-switch").on("click", function () {
                $(".user-uploaded").show();
                $(".al-uploaded").hide();
            })

            $(".unified-switch").on("click", function () {
                $(".unified").show();
                $(".quick-read").hide();
                $(".learn-mode").hide();
            });

            $(".quick-read-switch").on("click", function () {
                $(".unified").hide();
                $(".quick-read").show();
                $(".learn-mode").hide();
            });

            $(".learn-mode-switch").on("click", function () {
                $(".unified").hide();
                $(".quick-read").hide();
                $(".learn-mode").show();
            });

            // calling api to update content status
            $.ajax({
                url: '../api/change-status.php',
                type: 'POST',
                data: {
                    permission: "Access"
                },
                success: function (response) {
                    console.log(response);
                }
            });

            // flash text
            $(document).ready(function () {
                var jokes = $('.main-logo');
                var index = 0;

                function showNextJoke() {
                    jokes.eq(index).fadeIn(1000).delay(1500).fadeOut(1000, function () {
                        index = (index + 1) % jokes.length;
                        showNextJoke();
                    });
                }

                showNextJoke();
            });
        });
    </script>

</body>