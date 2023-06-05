<?php
require_once 'autoload.php'; // Load the required Azure Blob Storage SDK

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

$connectionString = 'DefaultEndpointsProtocol=https;AccountName=gptdemo7020140432;AccountKey=k3z0/JCQH3yV/9iSceGe+s1dtdIUbp8anSUQ/a0sDsrw34tuFHfd7usPn42bCvjaUdzlfpNvA09O+AStCRDO3w==;EndpointSuffix=core.windows.net';
$containerName = 'azureml-blobstore-fa29c537-9f94-4f15-8679-5f1e2fd597e4';
$directoryName = 'documents/';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file = $_FILES["fileToUpload"];

    if ($file["error"] === UPLOAD_ERR_OK) {
        $fileName = $file["name"];
        $fileTempPath = $file["tmp_name"];
        $fileSize = $file["size"];

        $blobClient = BlobRestProxy::createBlobService($connectionString);

        // Generate a unique name for the blob using a GUID
        $uniqueBlobName = $directoryName . uniqid() . '-' . $fileName;

        // Set the blob options
        $options = new CreateBlockBlobOptions();
        $options->setContentType($file["type"]);

        // Upload the file to Azure Blob Storage
        $blobClient->createBlockBlob($containerName, $uniqueBlobName, fopen($fileTempPath, "r"), $options);

        echo "File uploaded successfully. Blob name: $uniqueBlobName";
    } else {
        echo "Error uploading file. Error code: " . $file["error"];
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>File Upload</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="fileToUpload">Select file (PDF or TXT):</label>
        <input type="file" name="fileToUpload" id="fileToUpload" accept=".pdf,.txt"><br>
        <button type="submit">Upload File</button>
    </form>
</body>
</html>
