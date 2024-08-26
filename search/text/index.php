<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Guide Me Web</title>
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
            /*background-color: #2c2c2c;*/
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
            color: #000;
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
            font-size: 15px;
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
        
        /* suggestions */
        .suggestions-container {
            padding: 10px;
        }
        
        .suggestions {
            /*background-color: #F2F4F4;*/
            padding: 15px;
            border: 0.1px solid #F2F4F4;
            border-radius: 5px;
            margin-top: 10px; /* Adjust as needed */
            margin-bottom: 10px;
            font-weight: 300;
            font-size: 14px;
        }
        
        .heading-sub{
            margin-bottom: 0px;
            margin-top: 20px;
            font-size: 11px;
            text-align: center;
            color: #808B96;
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
        <div class="search-back-icon search-icon material-icons">arrow_back</div>
        <div class="search-box-container">
            <input type="text" autocomplete="off" class="input-box poppins-regular" id="searchInput" placeholder="Search..">
        </div>
        <div class="search-mic-icon search-icon material-icons">mic</div>
    </div>
    
    <div class="heading-sub">Search Suggestions</div>
    
    <div id="suggestions-container" class="suggestions-container">
        <!-- Suggestions will be appended here -->
    </div>
    
    <script>
        
        $(document).ready(function() {
    // Focus on input box when page loads
    $('.input-box').focus();

    function getQueryParamValue(paramName) {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(paramName);
    }

    let textFromURL = getQueryParamValue('search');
    $(".input-box").val(textFromURL);

    const searchInput = document.getElementById('searchInput');
    const suggestionsList = document.getElementById('suggestions-container');

    // Function to fetch suggestions from Datamuse API
    async function fetchSuggestions(query) {
        const endpoint = `https://api.datamuse.com/sug?s=${query}`;
        try {
            const response = await fetch(endpoint);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = await response.json();
            return data;
        } catch (error) {
            console.error('Error fetching suggestions:', error);
            return [];
        }
    }

    // Function to update suggestions based on user input
    async function updateSuggestions() {
        const query = searchInput.value.trim();
        if (query.length === 0) {
            suggestionsList.innerHTML = '';
            return;
        }

        const suggestions = await fetchSuggestions(query);
        suggestionsList.innerHTML = '';

        suggestions.forEach(suggestion => {
            const suggestionDiv = document.createElement('div');
            $(suggestionDiv).addClass("suggestions").text(suggestion.word);
            suggestionsList.appendChild(suggestionDiv);
        });

        // Event listener for clicks on suggestions
        $(".suggestions").on("click", function() {
            let value = $(this).text(); // Get text of clicked suggestion
            console.log("ho");
            window.location.href = "../../result/?search=" + encodeURIComponent(value);
        });
    }

    // Event listener for input changes
    searchInput.addEventListener('input', updateSuggestions);
    
    $(".search-back-icon").on("click",function(){
        window.location.href = "../../home";
    });
    
    $(".search-mic-icon").on("click",function(){
        window.location.href = "../../search/mic";
    })
    
    $(document).on('keypress', function(e) {
        if (e.which == 13) { // Enter key
            const value = $("#searchInput").val();
            window.location.href = "../../result/?search=" + encodeURIComponent(value);
        }
    });
});


    </script>
    
    </div>
</div>

</body>

</html>