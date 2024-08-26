<?php

$pdf = $_GET['pdf'];
$pdfURL = "../pdf/".$pdf;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF Reader - Guide Me Web</title>
  
  <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <style>
  
  body {
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #FFF;
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
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
    }
    iframe {
      width: 100%;
      height: 100vh;
      border: none; /* optional: to remove border */
    }
    
    .header{
        padding: 20px;
        font-size: 15px;
        display: flex;
        flex-direction: row;
    }
    
    .close-btn{
        margin-left: auto;
        font-size: 20px;
        cursor: pointer;
    }
  </style>
</head>
<body class="poppins-regular">
    <div class="header">
        <div class="heading">PDF</div>
        <div class="close-btn material-icons">close</div>
    </div>
  <iframe src="<?php echo $pdfURL; ?>#toolbar=0" frameborder="0"></iframe>
  
  <script>
      $(".close-btn").on("click",function(){
          history.back();
      })
  </script>
</body>
</html>