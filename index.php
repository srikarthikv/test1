<!DOCTYPE html>
<html>
<head>
    <title>Q&A Form</title>
</head>
<body>
    <form method="POST" action="http://your_flask_server_url/qanda">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required><br>

        <label for="document">Document Path:</label>
        <input type="text" name="document" id="document" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
