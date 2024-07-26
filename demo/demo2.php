<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $query = urlencode($_POST['query']);

    // DuckDuckGo API URL
    $duckduckgoApiUrl = "https://api.duckduckgo.com/?q={$query}&format=json&pretty=1";

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $duckduckgoApiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    // Get URLs from the DuckDuckGo API
    $urls = [];
    foreach ($data['RelatedTopics'] as $topic) {
        if (isset($topic['FirstURL'])) {
            $urls[] = $topic['FirstURL'];
        }
    }
} else {
    $urls = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Demo PHP Page</title>
</head>
<body>
    <h1>Find Sites from DuckDuckGo</h1>
    <form method="post" action="">
        <label for="query">Enter your query:</label>
        <input type="text" id="query" name="query" required>
        <button type="submit">Search</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>Suggested URLs:</h2>
        <?php if (!empty($urls)): ?>
            <ul>
                <?php foreach ($urls as $url): ?>
                    <li><a href="<?php echo htmlspecialchars($url); ?>" target="_blank"><?php echo htmlspecialchars($url); ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No results found</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>