<!DOCTYPE html>
<html>
<head>
    <title>BRT-GPT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .chat-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .message {
            margin-bottom: 10px;
        }

        .user-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            align-self: flex-start;
        }

        .bot-message {
            background-color: #e5e5ea;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            align-self: flex-end;
        }

        .input-container {
            display: flex;
        }

        .input-container input[type="text"] {
            flex: 1;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .input-container button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="message bot-message">Welcome! How can I assist you today?</div>
        <form action="" method="POST">
            <div class="input-container">
                <input type="text" name="question" id="question" required>
                <button type="submit">Send</button>
            </div>
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
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            // Execute the request
            $response = curl_exec($ch);

            // Check for errors
            if (curl_errno($ch)) {
                echo '<div class="message bot-message">Error: ' . curl_error($ch) . '</div>';
            } else {
                // Output the user's message
                echo '<div class="message user-message">' . $question . '</div>';
                // Output the bot's response
                echo '<div class="message bot-message">' . $response . '</div>';
            }

            // Close cURL session
            curl_close($ch);
        }
        ?>
    </div>
</body>
</html>
