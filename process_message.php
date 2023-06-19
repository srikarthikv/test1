<?php
if (isset($_POST['send_button'])) {
    $userMessage = $_POST['user_message'];

    // Save the user's message to a text file
    $file = 'messages.txt';

    // Open the file in append mode
    $handle = fopen($file, 'a');

    // Write the user's message to the file
    fwrite($handle, "User: " . $userMessage . PHP_EOL);

    // Close the file handle
    fclose($handle);

    // Call a function or make an API request to your chatbot backend to get the chatbot's response
    // Replace the placeholder below with your actual chatbot logic
    $chatbotResponse = getChatbotResponse($userMessage);

    // Save the chatbot's response to the text file
    $handle = fopen($file, 'a');

    // Write the chatbot's response to the file
    fwrite($handle, "Chatbot: " . $chatbotResponse . PHP_EOL);

    // Close the file handle
    fclose($handle);
}
header('Location: index.php'); // Redirect back to the chat UI
exit;
?>
