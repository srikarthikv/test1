<?php
$file = 'messages.txt';

// Read the contents of the text file
$contents = file_get_contents($file);

// Explode the contents by newline character to get individual messages
$messages = explode(PHP_EOL, $contents);

foreach ($messages as $message) {
    // Skip empty lines
    if (empty(trim($message))) {
        continue;
    }

    // Extract the message type and content
    $messageParts = explode(':', $message, 2);
    $messageType = trim($messageParts[0]);
    $messageContent = trim($messageParts[1]);

    if ($messageType === 'User') {
        echo '<div class="user-message">' . $messageContent . '</div>';
    } elseif ($messageType === 'Chatbot') {
        echo '<div class="chatbot-response">' . $messageContent . '</div>';
    }
}
?>
