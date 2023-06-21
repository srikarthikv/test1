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

    // Split the message content into lines or points
    $lines = explode("\n", $messageContent);

    if ($messageType === 'User') {
        foreach ($lines as $line) {
            echo '<div class="user-message">' . $line . '</div>';
        }
    } elseif ($messageType === 'Chatbot') {
        foreach ($lines as $line) {
            echo '<div class="chatbot-response">' . $line . '</div>';
        }
    }
}
?>
