<!DOCTYPE html>
<html>
<head>
    <title>Chatbot UI</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        
        #chat-container {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        
        #chat-thread {
            overflow-y: auto;
            max-height: 300px;
            padding-bottom: 10px;
        }
        
        .message {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            max-width: 80%;
        }
        
        .user-message {
            background-color: #dbf7c9;
            align-self: flex-start;
        }
        
        .bot-message {
            background-color: #d2d2d2;
            align-self: flex-end;
        }
        
        .message p {
            margin: 0;
        }
        
        #user-input {
            margin-top: 20px;
        }
        
        #user-input input[type="text"] {
            width: 70%;
            padding: 5px;
            border: none;
            border-radius: 4px;
        }
        
        #user-input button {
            padding: 5px 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="chat-container">
        <div id="chat-thread">
            <?php include 'display_messages.php'; ?>
        </div>
        <div id="user-input">
            <form action="process_message.php" method="POST">
                <input type="text" name="user_message" placeholder="Type your message...">
                <button type="submit" name="send_button">Send</button>
            </form>
        </div>
    </div>
</body>
</html>
