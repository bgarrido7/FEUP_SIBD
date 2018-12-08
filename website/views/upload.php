<?php
extract($_POST);
if (isset($submit)) {
    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
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

        // You should also check filesize here. 
        if ($_FILES['upfile']['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
                $finfo->file($_FILES['upfile']['tmp_name']), array(
            'stl' => 'application/sla',
            'stl' => 'application/vnd.ms-pki.stl',
            'stl' => 'application/x-navistyle',
                ), true
                )) {
            echo "Its type is " . $_FILES['upfile'];
            throw new RuntimeException('Invalid file format.');
        }

        // You should name it uniquely.
        // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.
        if (!move_uploaded_file(
                        $_FILES['upfile']['tmp_name'], sprintf('./stls/%s.%s', sha1_file($_FILES['upfile']['tmp_name']), $ext
                        )
                )) {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        echo 'File is uploaded successfully.';
    } catch (RuntimeException $e) {

        echo $e->getMessage();
    }
}
?>



<h2>Upload STL</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select stl to upload:
    <input type="file" name="upfile" id="upfile">
    <input type="submit" value="Upload" name="submit">
</form>

