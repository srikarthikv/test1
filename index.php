<!DOCTYPE html>
<html>
<head>
    <title>Chatbot UI</title>
    <style>
        /* Add CSS styles for your chatbot UI here */
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
