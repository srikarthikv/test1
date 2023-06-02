<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Hello, PHP!</h1>
    <p>This is a PHP web app that sends a POST request.</p>
    <h1>Document Upload</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="document">Document:</label>
        <input type="file" name="document" id="document" required><br>

        <button type="submit">Upload</button>
    </form>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();

            var form = document.querySelector('form');
            var formData = new FormData(form);

            fetch('http://10.1.0.4:8000/embedding', {
                method: 'POST',
                mode: 'cors',
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
                // Handle the response data as desired
            })
            .catch(function(error) {
                console.log('Error:', error);
            });
        });
    </script>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the question from the form
        $question = $_POST['question'];

        // Set the request URL
        $url = 'http://10.1.0.4:8000/qanda';

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

    <form action="" method="POST">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
