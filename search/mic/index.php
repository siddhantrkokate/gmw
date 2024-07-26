<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mic | Search | Guide Me Web</title>
    
    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- CSS -->
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

        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
            padding: 20px;
        }

        .close-btn {
            font-size: 24px;
            display: flex;
            flex-direction: column;
            margin-left: auto;
        }

        .mic-input-text {
            margin-top: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 18px;
        }
    </style>
</head>

<body class="poppins-regular">

    <div class="close-btn material-icons">close</div>
    
    <center><div class="mic-input-text">Speak now! Listening...</div></center>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let recognition = new webkitSpeechRecognition(); // Create speech recognition object
            recognition.continuous = true; // Continuous listening
            recognition.interimResults = true; // Get interim results

            let finalTranscript = ''; // Variable to store the final transcription
            let listeningTimeout; // Timeout variable to track pause time

            recognition.onresult = function (event) {
                let interimTranscript = ''; // Variable to store interim transcription

                for (let i = event.resultIndex; i < event.results.length; ++i) {
                    if (event.results[i].isFinal) {
                        finalTranscript += event.results[i][0].transcript;
                    } else {
                        interimTranscript += event.results[i][0].transcript;
                    }
                }

                // Update the UI with the latest transcript (you can modify this part)
                document.querySelector('.mic-input-text').textContent = finalTranscript + interimTranscript;

                // Reset the timeout if speech is detected
                clearTimeout(listeningTimeout);
                listeningTimeout = setTimeout(() => {
                    // Pause listening after 3 seconds of no speech
                    recognition.stop();

                    // Redirect to result page with finalTranscript as a query parameter
                    window.location.href = `../../result/?search=${encodeURIComponent(finalTranscript)}`;
                }, 3000);
            };

            recognition.onend = function () {
                // Recording ends, perform any final actions here

                // Reset the animation state
                document.querySelector('.mic-out').style.animationPlayState = 'paused';
                setTimeout(() => {
                    document.querySelector('.mic-out').style.animationPlayState = 'running';
                }, 50);

                // Clear the timeout when recognition ends
                clearTimeout(listeningTimeout);
            };

            // Start speech recognition automatically
            recognition.start();

            // Optional: Stop recognition on page unload
            window.addEventListener('unload', function () {
                recognition.stop();
            });
        });
        
        $(".close-btn").on("click",function(){
            window.location.href = "../../home";
        })
    </script>

</body>

</html>