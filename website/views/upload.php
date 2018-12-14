<?php
extract($_POST);
include('database/project.php');
if (isset($submit)) {
    try {

        if (
                !isset($_FILES['upfile']['error']) ||
                is_array($_FILES['upfile']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES['upfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        if ($_FILES['upfile']['size'] > 1000000) {
            $_SESSION['error_message'] = 'Invalid file type';
        }


        $ext = substr($_FILES['upfile']['name'], -3);
        if ($ext != 'stl') {
            //echo "Its type is " . $_FILES['upfile'];
            $_SESSION['error_message'] = 'Invalid file type';
        }


        if (!move_uploaded_file($_FILES['upfile']['tmp_name'], sprintf('./stls/%s', $_FILES['upfile']['name']))) {
            $_SESSION['error_message'] = 'Upload unsuccessful!';
        }

        $_SESSION['success_message'] = 'Upload successful!';

        // createProject($_SESSION['username'], $_FILES['upfile']['name'], $description, $image_path, $stl_path, $category);
    } catch (RuntimeException $e) {

        $_SESSION['error_message'] = 'Upload unsuccessful!';
    }
    //header("Refresh:0");
}
?>



<h2>Upload STL</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Name:
    <input type="text" name="name">
    Select stl to upload:
    <input type="file" name="upfile" id="upfile">
    Description:
    <textarea name="description" dirname="description.dir"></textarea>

    <input type="submit" value="Upload" name="submit">
</form>

