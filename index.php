<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Hello, PHP!</h1>
    <p>This is a PHP web app that sends a GET request.</p>

    <?php
    // Send GET request
    $url = 'http://20.127.39.47:8000';
    $response = file_get_contents($url);

    // Display response
    echo '<p>Response:</p>';
    echo '<pre>' . $response . '</pre>';
    ?>
</body>
</html>
