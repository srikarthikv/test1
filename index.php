<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Hello, PHP!</h1>
    <p>This is a PHP web app that sends a GET request.</p>

    <?php

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the question and document path from the form data
        $question = $_POST['question'];
        $document = $_POST['document'];

        // Set the command to be executed
        $command = 'curl -X GET "http://10.1.0.4:8000/qanda?question=' . urlencode($question) . '&document=' . urlencode($document) . '"';

        // Execute the command and capture the output
        $output = exec($command);

        // Output the response
        echo $output;
    }
    ?>

    <form method="POST">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required><br>

        <label for="document">Document Path:</label>
        <input type="text" name="document" id="document" required><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
