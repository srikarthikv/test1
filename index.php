<!DOCTYPE html>
<html>
<head>
    <title>BRT-GPT</title>
</head>
<body>
   <h1>QnA</h1>

    <form action="" method="POST">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required><br>

        <button type="submit">Submit</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the question from the form
        $question = $_POST['question'];

        // Set the request URL
        $url = 'https://10.1.0.4:8000/question';

        // Set the request data
        $data = array(
            'question' => $question,
        );

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

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
    }
    ?>

</body>
</html>
