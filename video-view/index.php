<?php
    $video = $_GET['video'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Watch - Guide Me Web</title>
  
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
    }

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
    
    .iframe-container{
        display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-bottom: 70%;
    }

    iframe {
      width: 100%;
      height: 250px;
      border: none;
    }

    .header {
      padding: 20px;
      font-size: 15px;
      display: flex;
      flex-direction: row;
      border-bottom: 0.1px solid #2e2e2e;
    }

    .close-btn {
      margin-left: auto;
      font-size: 20px;
      cursor: pointer;
    }
    
    .video-url{
        display: none;
    }
    
    @media screen and (min-width: 1200px){
        iframe{
            height: 90vh;
        }
    }
  </style>
</head>
<body class="poppins-regular">
  <div class="header">
    <div class="heading">YouTube Video</div>
    <div class="close-btn material-icons">close</div>
  </div>
  <div class="iframe-container">
    <iframe 
      id="youtube-iframe"
      src=""
      frameborder="0"
      allowfullscreen
    ></iframe>
  </div>
    
    <div class="video-url"><?php echo $video; ?></div>
    
  <script>
    $(".close-btn").on("click", function() {
      history.back();
    });

    function getQueryParamValue(url, paramName) {
      var urlParams = new URLSearchParams(new URL(url).search);
      return urlParams.get(paramName);
    }

    let videoURL = $(".video-url").text();
    console.log(videoURL);
    let videoID = getQueryParamValue(videoURL, 'v');
    
    if (videoID) {
      $("#youtube-iframe").attr("src", "https://www.youtube.com/embed/" + videoID);
    } else {
      console.error("Video ID not found in the URL");
    }
  </script>
</body>
</html>