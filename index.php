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

    // Set the request URL
    $url = 'http://10.1.0.4:8000/qanda';

    // Set the request data
    $data = array(
        'question' => $question,
        'document' => $document
    );

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        // Output the response
        echo $response;
    }

    // Close cURL session
    curl_close($ch);

    ?>

    <form action="qanda" method="POST">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required><br>

        //<label for="document">Document Path:</label>
        //<input type="text" name="document" id="document" required><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
