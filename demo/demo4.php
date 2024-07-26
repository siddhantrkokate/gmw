<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = isset($_POST['query']) ? urlencode($_POST['query']) : '';

    // Wikipedia API endpoint
    $url = "https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&titles={$query}&formatversion=2&exintro=1&explaintext=1";

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    // Check for errors
    if ($response === FALSE) {
        echo json_encode(['error' => 'Unable to get response from API']);
    } else {
        echo $response;
    }
    exit; // Ensure no further HTML is sent
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wikipedia API Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchButton').click(function() {
                var userQuery = $('#queryInput').val();
                
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: { query: userQuery },
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            $('#result').text(response.error);
                        } else {
                            var page = response.query.pages[0];
                            var resultHtml = '<h2>Results:</h2>';
                            if (page.extract) {
                                resultHtml += '<p>' + page.extract + '</p>';
                            } else {
                                resultHtml += '<p>No results found.</p>';
                            }
                            $('#result').html(resultHtml);
                        }
                    },
                    error: function() {
                        $('#result').text('An error occurred while making the request.');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Search Wikipedia</h1>
    <input type="text" id="queryInput" placeholder="Enter your query">
    <button id="searchButton">Search</button>
    <div id="result"></div>
</body>
</html>