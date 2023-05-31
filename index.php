<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Hello, PHP!</h1>
    <p>This is a PHP web app that sends a GET request.</p>
    <!-- This setup is not suitable for production. -->
<!-- Only use it in development! -->
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
<script async src="https://ga.jspm.io/npm:es-module-shims@1.7.0/dist/es-module-shims.js"></script>
<script type="importmap">
{
  "imports": {
    "react": "https://esm.sh/react?dev",
    "react-dom/client": "https://esm.sh/react-dom/client?dev"
  }
}
</script>
<script type="text/babel" data-type="module">
  import React, { StrictMode } from 'react';
  import { createRoot } from 'react-dom/client';

  function Greeting() {
    return (
      <div>
        <h1>ChatGPT Test Example</h1>
        <div>
          <button onClick={curlTwo}>Do cURL Call Two</button>
          <textarea id="result2" rows={10} cols={100} ></textarea>
        </div>
        <div>
          <button onClick={curlThree}>Do cURL Call Three</button>
          <textarea id="result3" rows={10} cols={100} ></textarea>
        </div>
      </div>
    );
  }

  function curlTwo() {
    let absPath = prompt("Please enter the path.", "Dengue-National-Guidelines-2014.pdf");
    //In GET we cannot send frontslash (/) in the URL - so please use only the filename as parameter
    fetch('https://10.1.0.4:8000/embedding?document=' + absPath, {  // Enter your IP address/host here

      method: 'GET',//'POST',
      mode: 'cors',
      headers: {
        'Content-type': 'application/json; charset=UTF-8',
      },
      //Following is the body input parameter example of POST call
      // body: JSON.stringify({
      //   "document": absPath
      // }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        document.getElementById("result2").value = JSON.stringify({ data });
      })
      .catch((err) => {
        console.log(err.message);
      });
  }

  function curlThree() {

    let question = prompt("Please enter the question.");
    let document = prompt("Please enter the document path with name.", "vectorstore.pkl");

    fetch('https://10.1.0.4:8000/qanda?question=' + question + "&document=" + document, {  // Enter your IP address/host here

      method: 'GET', //'POST',
      mode: 'cors',
      headers: {
        'Content-type': 'application/json; charset=UTF-8',
      },
      //Following is the body input parameter example of POST call
      // body: JSON.stringify({
      //   "question": question,
      //   "document": document
      // }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        document.getElementById("result3").value = JSON.stringify({ data });
      })
      .catch((err) => {
        console.log(err.message);
      });
  }

  let App = function App() {
    return <Greeting />
  }


  const root = createRoot(document.getElementById('root'));
  root.render(
    <StrictMode>
      <App />
    </StrictMode>
  );
</script>
<style>
  body {
    font-family: sans-serif;
    margin: 20px;
    padding: 0;
  }
</style>

    <?php
    // Send GET request
    $url = 'https://10.1.0.4:8000';
    $response = file_get_contents($url);

    // Display response
    echo '<p>Response:</p>';
    echo '<pre>' . $response . '</pre>';
    ?>
</body>
</html>

