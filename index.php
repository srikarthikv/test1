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
            animation: messageAppear 0.3s ease-in-out forwards;
        }

        .typing-indicator {
            height: 1em;
            background-color: #e5e5ea;
            border-radius: 5px;
            animation: typing 1s linear infinite;
            opacity: 0;
            margin-bottom: 10px;
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

        @keyframes typing {
            0% {
                width: 0;
                opacity: 0.5;
            }
            50% {
                width: 100%;
                opacity: 1;
            }
            100% {
                width: 0;
                opacity: 0.5;
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
                // Output the typing indicator
                echo '<div class="typing-indicator"></div>';
                // Output the bot's response with typing animation
                echo '<div class="message bot-message" style="animation-delay: 0.5s"><span class="typing-animation">' . $response . '</span></div>';
            }

            // Close cURL session
            curl_close($ch);
        }
        ?>
    </div>

    <script>
        // Delay and animate the bot message after the typing indicator
        setTimeout(function() {
            var botMessage = document.querySelector('.bot-message');
            botMessage.style.opacity = 1;
            var typingIndicator = document.querySelector('.typing-indicator');
            typingIndicator.style.opacity = 0;
            typingIndicator.style.display = 'none';
            animateBotMessage(botMessage);
        }, 2000);

        // Animate the bot message with typewriter effect
        function animateBotMessage(message) {
            var messageText = message.querySelector('.typing-animation').textContent;
            message.innerHTML = '';

            var delay = 100;
            var i = 0;
            var typing = setInterval(function() {
                message.innerHTML += messageText.charAt(i);
                i++;
                if (i > messageText.length) {
                    clearInterval(typing);
                }
            }, delay);
        }
    </script>
</body>
</html>
