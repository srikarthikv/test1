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
        
        #chat-header {
            background-color: lightblue;
            padding: 10px;
            text-align: right;
            border-radius: 8px 8px 0 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        #chat-header h1 {
            margin: 0;
            font-size: 24px;
            color: #fff;
            flex-grow: 1;
      		margin-right: 50px;
        }
        
        #chat-header img {
            width: 40px;
            height: 40px;
            vertical-align: middle;
      		margin-right: 20px
        }
        
        #chat-thread {
            overflow-y: auto;
            max-height: 300px;
            padding-bottom: 10px;
        }
        
        .message-container {
            margin-bottom: 10px;
        }
        
        .user-message {
            background-color: #d3d3d3;
            color: #000;
            padding: 10px;
            border-radius: 8px;
            max-width: 80%;
            align-self: flex-start;
        }
        
        .bot-message {
            background-color: #c1f2c1;
            color: #000;
            padding: 10px;
            border-radius: 8px;
            max-width: 80%;
            align-self: flex-end;
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
        <div id="chat-header">
            <h1>Chatbot - Technical Support</h1>
            <img src="logo.png" alt="Chatbot Logo">
        </div>
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
