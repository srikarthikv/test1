<?php
if (isset($_POST['send_button'])) {
    $userMessage = $_POST['user_message'];

    // Save the user's message to a text file
    $file = 'messages.txt';

    // Open the file in append mode
    $handle = fopen($file, 'a');

    // Write the user's message to the file
    fwrite($handle, "Human: " . $userMessage . PHP_EOL);

    // Close the file handle
    fclose($handle);

    // Read the recent 5 interchanges from the file
    $recentInterchanges = array();
    $handle = fopen($file, 'r');
    while (($line = fgets($handle)) !== false) {
        $recentInterchanges[] = $line;
        if (count($recentInterchanges) > 5) {
            array_shift($recentInterchanges);
        }
    }
    fclose($handle);

    // Make a request to the Flask server running on your Azure VM
    $flaskServerUrl = 'http://10.1.0.4:8000/get_chatbot_response';
    $data = array(
        'user_message' => $userMessage,
        'context' => implode("", $recentInterchanges)
    );
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data),
        ),
    );
    $context = stream_context_create($options);
    $chatbotResponse = file_get_contents($flaskServerUrl, false, $context);

    // Save the chatbot's response to the text file
    $handle = fopen($file, 'a');

    // Write the chatbot's response to the file
    fwrite($handle, "AI: " . $chatbotResponse . PHP_EOL);

    // Close the file handle
    fclose($handle);
}
header('Location: index.php'); // Redirect back to the chat UI
exit;
?>
