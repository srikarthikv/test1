<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Hello, PHP!</h1>
    <p>This is a PHP web app that sends a GET request.</p>

    <?php

    // Prompt for question and document path
    $question = readline("Enter the question: ");
    $document = readline("Enter the document path: ");

    // Set the command to be executed
    $command = 'curl -X GET "http://10.1.0.4:8000/qanda?question=' . urlencode($question) . '&document=' . urlencode($document) . '"';

    // Execute the command and capture the output
    $output = exec($command);

    // Output the response
    echo $output;

    ?>

</body>
</html>
