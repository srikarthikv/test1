<!DOCTYPE html>
<html>
<head>
    <title>PHP Web App</title>
</head>
<body>
    <h1>Hello, HTML!</h1>
    <p>This is an HTML web app that sends a POST request.</p>

    <form action="/qanda" method="POST">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required><br>

        <label for="document">Document Path:</label>
        <input type="text" name="document" id="document" required><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
