<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header - Guide Me Web</title>
    
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FFFFFF;
            color: #000000;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: "Poppins", sans-serif;
        }
        
        /* Header styling */
        .header {
            padding: 15px 20px;
            border-bottom: 0.1px solid #E6E6E6;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
            /*position: fixed;*/
            /*top: 0;*/
            background-color: #FFF;
        }
        
        .header-logo {
            text-align: center;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        
        .header-icon {
            color: #000;
            cursor: pointer;
        }
        
        .header-add-icon {
            margin-left: auto;
        }
        
        /* Navigation bar styling */
        .nav-bar {
            position: fixed;
            background-color: #000;
            top: 0;
            left: 0;
            z-index: 2;
            width: 0;
            height: 100%;
            overflow: hidden;
            transition: width 0.5s ease;
        }
        
        .nav-bar-content-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
        }
        
        .nav-bar-content {
            color: #FFF;
            padding: 15px;
            font-size: 13px;
            width: 100%;
            cursor: pointer;
        }
        
        .nav-bar-close-btn {
            position: absolute;
            top: 30px;
            right: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    
    

    <!-- Header -->
    <div class="header">
        <div class="material-icons header-icon menu-icon" title="Explore more" style="font-size: 23px;">menu</div>
        <div class="header-logo" title="Home">Guide Me Web</div>
        <div class="material-icons header-icon header-add-icon" style="font-size: 23px;" title="Contribute">add</div>
    </div>

    <!-- Navigation Bar -->
    <div class="nav-bar">
        <div class="nav-bar-close-btn material-icons" style="font-size: 23px;color: #FFF">close</div>
        <div class="nav-bar-content-container">
            <div class="nav-bar-content">Privacy Policy</div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Hide additional menu (if any)
            $(".additional-menu").hide();

            // Open navigation bar on menu icon click
            $(".menu-icon").on("click", function () {
                $(".nav-bar").css("width", "100%");
            });

            // Close navigation bar on close button click
            $(".nav-bar-close-btn").on("click", function () {
                $(".nav-bar").css("width", "0");
            });

            // Navigate to different pages on navigation bar content click
            $(".nav-bar-content").on("click", function () {
                let value = $(this).text();
                window.location.href = "../page/?page=" + value;
            });

            // Navigate to home page on header logo click
            $(".header-logo").on("click", function () {
                window.location.href = "../home/";
            });
            
            // Navigate to add page on add icon click
            $(".header-add-icon").on("click", function () {
                window.location.href = "../add/";
            });
        });
    </script>


</body>

</html>