<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Document Upload</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="document">Document:</label>
        <input type="file" name="document" id="document" required><br>

        <button type="submit">Upload</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the document file
        $documentFile = $_FILES['document'];

        // Set the URL of the server
        $url = 'http://your-server-url/qanda';

        // Create a cURL handle
        $curl = curl_init();

        // Set the cURL options
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);

        // Create an array with the POST data
        $postData = array(
            'document' => curl_file_create($documentFile['tmp_name'], $documentFile['type'], $documentFile['name'])
        );

        // Set the POST data
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

        // Execute the request and get the response
        $response = curl_exec($curl);

        // Check for cURL errors
        if (curl_errno($curl)) {
            $error = curl_error($curl);
            // Handle the error
            // ...
        } else {
            // Process the response
            // ...
        }

        // Close the cURL handle
        curl_close($curl);
    }
    ?>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var fileInput = document.getElementById('document');
            var file = fileInput.files[0];

            var formData = new FormData();
            formData.append('document', file);

            fetch('http://10.1.0.4:8000/embedding', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    document: file.name
                })
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

    <form action="" method="POST">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required><br>
        <label for="document">Document:</label>
        <input type="file" name="document" id="document" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
