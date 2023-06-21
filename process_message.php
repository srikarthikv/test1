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

    // Make a request to the Flask server running on your Azure VM
    $flaskServerUrl = 'http://10.1.0.4:8000/get_chatbot_response';
    $data = array('user_message' => $userMessage);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data),
        ),
    );
    $context = stream_context_create($options);
    $chatbotResponse = file_get_contents($flaskServerUrl, false, $context);

    // Split the chatbot's response into lines or points
    $lines = explode("\n", $chatbotResponse);

    // Open the file in append mode again
    $handle = fopen($file, 'a');

    // Write each line or point of the chatbot's response to the file
    foreach ($lines as $line) {
        fwrite($handle, "Chatbot: " . trim($line) . PHP_EOL);
    }

    // Close the file handle
    fclose($handle);
}

header('Location: index.php'); // Redirect back to the chat UI
exit;
?>
