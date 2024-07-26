<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bottom Navigation - Guide Me Web</title>
    
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
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        /* Bottom Navigation Container */
        .bottom-nav {
            display: flex;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 0.1px solid #D3D3D3;
            background-color: #FFF;
        }
        
        /* Individual Menu Item Container */
        .nav-item {
            flex: 1;
            text-align: center;
            padding: 13px 0;
            font-size: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }
        
        /* Icon Styling */
        .nav-icon {
            font-size: 22px;
            padding-bottom: 10px;
        }
        
        @media screen and (min-width: 1300px){
            .bottom-nav{
                width: 40%;
            }
            
            .nav-icon {
                font-size: 18px;
                padding-bottom: 5px;
            }
            
            .nav-item{
                font-size: 11px;
            }
        }
        
        @media screen and (min-width: 1100px) and (max-width: 1299px){
            .bottom-nav{
                width: 60%;
            }
            .nav-icon {
                font-size: 18px;
                padding-bottom: 5px;
            }
            
            .nav-item{
                font-size: 11px;
            }
        }
        
        @media screen and (min-width: 900px) and (max-width: 1099px){
            .bottom-nav{
                width: 70%;
            }
            .nav-icon {
                font-size: 18px;
                padding-bottom: 5px;
            }
            
            .nav-item{
                font-size: 11px;
            }
        }
    </style>
</head>

<body>
    
    <!-- Bottom Navigation Bar -->
    <div class="bottom-nav">
        <div class="nav-item" id="nav-home">
            <div class="nav-icon material-icons">home</div>
            <div class="nav-text">Home</div>
        </div>
        <div class="nav-item" id="nav-save">
            <div class="nav-icon material-icons">collections_bookmark</div>
            <div class="nav-text">Save</div>
        </div>
        <div class="nav-item" id="nav-studio">
            <div class="nav-icon material-icons">settings</div>
            <div class="nav-text">Studio</div>
        </div>
        <div class="nav-item" id="nav-profile">
            <div class="nav-icon material-icons">person</div>
            <div class="nav-text">Profile</div>
        </div>
    </div>
    
    <!-- JavaScript -->
    <script>
        $(document).ready(function() {
            // Navigation click event handlers
            $("#nav-home").on("click", function() {
                window.location.href = "../home/";
            });

            $("#nav-save").on("click", function() {
                window.location.href = "../save/";
            });

            $("#nav-studio").on("click", function() {
                window.location.href = "../studio/";
            });

            $("#nav-profile").on("click", function() {
                window.location.href = "../profile/";
            });
        });
    </script>
</body>

</html>