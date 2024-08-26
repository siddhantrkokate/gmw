
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - Guide Me Web</title>
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
            padding: 0;
            background-color: #FFF;
            color: #000;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* poppins google font */
        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        
        /* search bar */
        .search-bar-container {
            background-color: #FFF;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px 10px;
        }
        
        .search-icon {
            font-size: 23px;
            min-width: 45px;
            background-color: #EAECEE;
            min-height: 45px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }
        
        .search-back-icon {
            margin-right: auto;
        }
        
        .search-mic-icon {
            margin-left: auto;
        }
        
        .search-box-container {
            width: 100%;
            margin-right: 5px;
            margin-left: 5px;
        }
        
        .input-box {
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            min-height: 45px;
            background-color: #EAECEE;
            border: 0px solid red;
            border-radius: 5px;
            outline: none;
            color: #566573;
            padding-left: 20px;
        }
        
        ::placeholder {
            color: #566573; /* Change this to your desired color */
        }
        
        /* content */
        .content-container{
            margin: 20px;
        }
        
        .content{
            border: 1px solid #e6e6e6;
            width: 100%;
            box-sizing: border-box;
            border-radius: 7px;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.3s ease-in;
        }
        
        .content:hover{
            background-color: #EBEDEF;
        }
        
        .content-title{
            padding: 20px;
            color: #000;
            font-size: 16px;
        }
        
        .content-description{
            font-size: 13px;
            color: #999999;
            margin-top: -7px;
            padding: 0px 20px;
        }
        
        .content-assets-container{
            display: flex;
            flex-direction: row;
            width: 100%;
            margin-top: 20px;
        }
        
        .content-assets{
            width: calc(100%/3);
            padding: 10px;
            color: #5D6D7E;
            font-size: 13px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border: 0.1px solid #EBEDEF;
        }
        
        .content-assets-icon{
            font-size: 10px;
            margin-left: 10px;
            margin-top: -2px;
        }
        
        .content-id{
            display: none;
        }
        
        .special-mark{
            padding: 7px;
            font-size: 11px;
            text-align: center;
            background-color: #000;
            color: #FFF;
            margin-top: 20px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        
        @media screen and (min-width: 1300px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 40%;
            }
        }
        
        @media screen and (min-width: 1100px) and (max-width: 1299px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 60%;
            }
        }
        
        @media screen and (min-width: 900px) and (max-width: 1099px){
            .main-screen{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .screen{
                width: 70%;
            }
        }
    </style>

</head>

<body class="poppins-regular">
    
    <div class="main-screen">
    <div class="screen">

    <!-- search bar-->
    <div class="search-bar-container">
        <div class="search-back-icon search-icon material-icons" style="display:flex; flex-direction:column; justify-content:center; align-items:center">arrow_back</div>
        <div class="search-box-container">
            <input type="text" autocomplete="off" class="input-box poppins-regular" id="searchInput" placeholder="Search..">
        </div>
        <div class="search-mic-icon search-icon material-icons" style="display:flex; flex-direction:column; justify-content:center; align-items:center">mic</div>
    </div>
    
    
    
    <!-- content -->
    <!-- content suggestion -->
    <div class="content-container">
        
        <?php
            include("../api/connection.php");
            
            $search = $_GET['search'];
            
            $s1 = "select * from quickRead where `title` LIKE '%$search%' OR `description` LIKE '%$search%'";
            $q1 = mysqli_query($conn, $s1);
            
            while($r1=mysqli_fetch_assoc($q1)){
        ?>
        
        <div class="content">
            <div class="content-id"><?php echo $r1['contentID']; ?></div>
            <div class="content-title"><?php echo $r1['title']; ?></div>
            <div class="content-description"><?php echo $r1['description']; ?></div>
            
            <div class="special-mark">Quick Read</div>
        </div>
        <?php } ?>
        
        <?php
            
            $s2 = "select * from learnMode where `title` LIKE '%$search%' OR `description` LIKE '%$search%'";
            $q2 = mysqli_query($conn, $s2);
            
            while($r2=mysqli_fetch_assoc($q2)){
        ?>
        
        <div class="content">
            <div class="content-id"><?php echo $r2['contentID']; ?></div>
            <div class="content-title"><?php echo $r2['title']; ?></div>
            <div class="content-description"><?php echo $r2['description']; ?></div>
            
            <div class="special-mark" style="background-color: #FFF; color: #000;border-top: 0.1px solid #EBEDEF">Learn Mode</div>
        </div>
        <?php } ?>
        
    </div>

    <br><br><br><br>
    
    <?php include("../resources/bottom.php"); ?>
    
    <script>
        function getQueryParamValue(paramName) {
            var urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(paramName);
        }
    
        let textFromURL = getQueryParamValue('search');
        $(".input-box").val(textFromURL);
        
        $(".search-back-icon").on("click",function(){
            window.location.href = "../search/text/?search="+textFromURL;
        });
        
        $(".search-box-container").on("click",function(){
            window.location.href = "../search/text/?search="+textFromURL;
        });
        
        $(".search-mic-icon").on("click",function(){
            window.location.href = "../search/mic/";
        });
        
        $(".content").on("click",function(){
            let getContentId = $(this).find(".content-id").text();
            window.location.href = "../view/?read="+getContentId;
        });
    </script>
    
    </div>
</div>
    
</body>

</html>