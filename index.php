<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Hello, ChstGPT Demo!</h1>
    <p>This is a PHP web app that sends a GET/POST request to the Azure ChatGPT Engine.</p>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = json_decode(file_get_contents('php://input'), true);
      print_r($data);
      // Find out the request
      $request = $_SERVER['REQUEST_URI'];
      // Processing part of the Embedding
      if ($request == "/embedding") {
	print_r("In Embedding");
	$url = 'http://10.1.0.4:8000/embedding';
        $crl = curl_init($url);
      // Processing part of the Q&A
      } elseif ($request == "/qanda") {
	print_r("In Q&A");
	$url = 'http://10.1.0.4:8000/qanda';
        $crl = curl_init($url);
      }
      // Frame the POST Request
      curl_setopt($crl, CURLOPT_POST, 1);
      curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode($data));
      curl_setopt($crl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
      // Execute the POST request
      $result = curl_exec($crl);
      echo $result;
      } else {
   // Process GET request
      $url = 'http://10.1.0.4:8000';
      $response = file_get_contents($url);
      // Display response
      echo '<p>Response:</p>';
      echo '<pre>' . $response . '</pre>';
    }
    ?>
</body>
</html>

