<?php
// Handle the API request and generation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user input prompt
    $prompt = $_POST['prompt'];

    header('Content-Type: image/png'); // Assuming the API returns PNG image

    // Replace with your Hugging Face API key
    $api_key = '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';

    // Define the endpoint and parameters for the image generation
    $endpoint = 'https://api-inference.huggingface.co/models/CompVis/stable-diffusion-v1-4';
    $data = array(
        'inputs' => $prompt,
        'options' => array('seed' => 42)
    );

    $headers = array(
        'Authorization: Bearer ' . $api_key,
        'Content-Type: application/json'
    );

    // Initialize cURL
    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute the API request
    $response = curl_exec($ch);
    curl_close($ch);

    // Output the image data directly
    echo $response;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Image</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Generate an Image</h1>
    <form id="image-form">
        <input type="text" id="prompt" name="prompt" placeholder="Enter a prompt" required>
        <button type="submit">Generate Image</button>
    </form>
    <div id="image-container"></div>

    <script>
        $(document).ready(function() {
            $('#image-form').submit(function(event) {
                event.preventDefault(); // Prevent the form from submitting normally

                var formData = new FormData(this);

                $.ajax({
                    url: '', // Leave empty as it points to the same page
                    type: 'POST',
                    data: formData,
                    processData: false, // Prevent jQuery from automatically processing the data
                    contentType: false, // Prevent jQuery from setting content type
                    xhrFields: {
                        responseType: 'blob' // Use blob to handle binary data
                    },
                    success: function(response) {
                        var img = $('<img>').attr('src', URL.createObjectURL(response));
                        $('#image-container').html(img);
                    },
                    error: function() {
                        $('#image-container').html('<p>Failed to generate image.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>