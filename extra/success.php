<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you! For your support.</title>

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
            background-color: #000;
            color: #FFF;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Poppins Google Font */
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        
        .text{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            padding: 20px;
            margin-top: 300px;
        }
        
    </style>
</head>

<body class="poppins-regular">
    
    <div class="text">
        <?php
        
            $msg = $_GET["text"];
            echo $msg;
            
        ?>
    </div>
    
    <script>
        setTimeout(function() {
          window.location.replace("../home/");
        }, 3000);
    </script>
    
</body>

</html>