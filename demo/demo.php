<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }

        #searchInput {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        #suggestions {
            list-style-type: none;
            padding: 0;
        }

        #suggestions li {
            padding: 10px;
            cursor: pointer;
        }

        #suggestions li:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Page</h1>
        <input type="text" id="searchInput" placeholder="Enter your query...">
        <ul id="suggestions"></ul>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const suggestionsList = document.getElementById('suggestions');

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
                const li = document.createElement('li');
                li.textContent = suggestion.word;
                suggestionsList.appendChild(li);
            });
        }

        // Event listener for input changes
        searchInput.addEventListener('input', updateSuggestions);
    </script>
</body>
</html>