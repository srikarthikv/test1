<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Hello, PHP!</h1>
    <p>This is a PHP web app that sends a GET request.</p>

    <?php

 

function curlTwo() {
  $absPath = readline("Please enter the path: "); // Prompt user for input

 

  $url = 'http://127.0.0.1:8000/embedding'; // Enter your IP address/host here
  $options = array(
    'http' => array(
      'method' => 'POST',
      'header' => 'Content-type: application/json; charset=UTF-8',
      'content' => json_encode(array(
        'document' => $absPath
      ))
    )
  );

 

  $context = stream_context_create($options);
  $response = file_get_contents($url, false, $context);

 

  if ($response === false) {
    echo "Error fetching data.";
  } else {
    $data = json_decode($response);
    echo json_encode($data);
  }
}

 

curlTwo();
?>
</body>
</html>
