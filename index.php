<!DOCTYPE html>
<html>
<head>
    <title>BRT-GPT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .chat-container {
            width: 80%;
            max-width: 600px;
            height: 80%;
            max-height: 600px;
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .chat-header {
            background-color: skyblue;
            color: white;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .chat-body {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .message {
            margin: 10px 0;
        }

        .user-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            align-self: flex-end;
            max-width: 70%;
            animation: messageAppear 0.3s ease-in-out forwards;
        }

        .bot-message {
            background-color: #e5e5ea;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            align-self: flex-start;
            max-width: 70%;
            opacity: 0;
            animation: messageAppear 0.3s ease-in-out forwards, typeWriter 4s linear 0.3s infinite;
        }

        .input-container {
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            margin-top: auto;
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
            background-color: skyblue;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 10px;
        }

        .options-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            margin-top: 10px;
        }

        .options-container label {
            margin-right: 10px;
        }

        .options-container select {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        @keyframes messageAppear {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes typeWriter {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h1>BRT-GPT</h1>
        </div>
        <div class="chat-body">
            <div class="message bot-message" style="animation-delay: 0.5s;">Welcome! How can I assist you today?</div>
        </div>
        <form action="" method="POST">
            <div class="input-container">
                <input type="text" name="question" id="question" required>
                <button type="submit">Send</button>
            </div>
            <div class="options-container">
                <label for="compress-option">Compress:</label>
                <select name="compress-option" id="compress-option">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the question from the form
            $question = $_POST['question'];
            $compressOption = $_POST['compress-option'];

            // Set the request URL
            $url = 'https://10.1.0.4:8000/question';

            // Set the request data
            $data = array(
                'question' => $question,
                'compress' => $compressOption,
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
                // Output the bot's response with delay and typewriter animation
                echo '<div class="message bot-message" style="animation-delay: 0.5s">' . $response . '</div>';
            }

            // Close cURL session
            curl_close($ch);
        }
        ?>
    </div>
</body>
</html>
