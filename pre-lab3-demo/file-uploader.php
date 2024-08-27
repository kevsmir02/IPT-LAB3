<?php
if (isset($_FILES['jpg_file'])) {
    $upload_directory = getcwd() . '/uploads/';
    // Handle Uploaded File
    $file_name = $_FILES['jpg_file']['name'];
    $uploaded_file = $upload_directory . basename($file_name);
    $temporary_file = $_FILES['jpg_file']['tmp_name'];

    if (!file_exists($upload_directory)) {
        // Create the destination folder
        mkdir($upload_directory);
    }

    if (move_uploaded_file($temporary_file, $uploaded_file)) {
        $relative_path = '/uploads/';
        $image_path = $relative_path . $file_name;
        ?>
        <img src="<?php echo $image_path; ?>" alt="Uploaded Image" />
        <?php
        exit;
    } else {
        echo 'Failed to upload file';
    }
}
?>
<html>
<head>
    <title>Upload File</title>
</head>

    <h4>File Upload</h4>

    <form
        method="POST"
        action="file-uploader.php"
        enctype="multipart/form-data"
    >
        <h3>JPG File</h3>
        <input type="file" name="jpg_file" accept=".jpg" />
        <button type="submit">
            Upload
        </button>
    </form>

</body>
</html>

