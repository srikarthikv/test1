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
            padding: 30px;
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
            margin-right: 20px;
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
            align-self: flex-end;
            text-align: right;
            margin-bottom: 10px;
        }
        
        .bot-message {
            background-color: #c1f2c1;
            color: #000;
            padding: 10px;
            border-radius: 8px;
            max-width: 80%;
            align-self: flex-start;
            margin-bottom: 10px;
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
    <div id="chat-c
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
            max-width: 1920px;
            margin: 150px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }
        
        #chat-header {
            background-color: #0cb3c4;
            padding: 30px;
            text-align: ;
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
            margin-right: 0px;
        }
        
        #chat-header img {
            width: 40px;
            height: 40px;
            vertical-align: middle;
            margin-right: 22px;
        }
        
        #chat-thread {
            overflow-y: auto;
            max-height: 1080px;
            padding-bottom: 15px;
        }
        
        .message-container {
            margin-bottom: 20px;
        }
        
        .user-message {
            background-color: #0cb3c4;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            width: fit-content;
            align-self: flex-end;
            text-align: right;
      		margin-top: 15px;
            margin-bottom: 10px;
      		margin-left: auto;
      		margin-right: 28px
        }
        
        .chatbot-response {
            background-color: #dddddd;
            color: #000;
            padding: 10px;
            border-radius: 8px;
            width: fit-content;
            align-self: flex-start;
            margin-bottom: 10;
      		margin-right: 28px
        }
        
        #user-input {
            margin-top: 20px;
        }
        
        #user-input input[type="text"] {
            width: 83%;
            padding: 10px;
            border:none ;
            border-radius: 4px;
        }
        
        #user-input button {
            padding: 10px 18px;
            border: none;
      		border-radius: 5px;
            background-color: #0cb3c4;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="chat-container">
        <div id="chat-header">
            <h1>AssistEdgeAI</h1>
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
ontainer">
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
