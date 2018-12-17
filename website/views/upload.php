<?php
extract($_POST);
include('database/project.php');
if (isset($submit)) {
    try {

        if (
                !isset($_FILES['upfile']['error']) || !isset($_FILES['image']['error']) || is_array($_FILES['upfile']['error']) || is_array($_FILES['image']['error'])
        ) {
            $_SESSION['error_message'] = 'Error.';
        }

        // Check file errors value.
        switch ($_FILES['upfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                $_SESSION['error_message'] = 'No file sent.';
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $_SESSION['error_message'] = 'Exceeded filesize limit.';

            default:
                $_SESSION['error_message'] = 'Upload Error';
        }
        $ext = substr($_FILES['upfile']['name'], -3);
        if ($_FILES['upfile']['size'] > 100000000) {
            $_SESSION['error_message'] = 'Exceeded filesize limit';
        } elseif ($ext != 'stl') {
            $_SESSION['error_message'] = 'Invalid file type';
        } elseif (!move_uploaded_file($_FILES['upfile']['tmp_name'], sprintf('./stls/%s_%s', $_SESSION['username'], $_FILES['upfile']['name'])) || !move_uploaded_file($_FILES['image']['tmp_name'], sprintf('./images/%s_%s', $_SESSION['username'], $_FILES['image']['name']))) {
            $_SESSION['error_message'] = 'Upload unsuccessful! -> moveuploaded files';
        } elseif (createProject($_SESSION['username'], $name, $description, sprintf('./images/%s_%s', $_SESSION['username'], $_FILES['image']['name']), sprintf('./stls/%s_%s', $_SESSION['username'], $_FILES['upfile']['name']), $category_selected)) {
            $_SESSION['success_message'] = 'Upload successful!';
        }
    } catch (RuntimeException $e) {

        $_SESSION['error_message'] = 'Upload unsuccessful!';
    }
    header("Refresh:0");
}
?>



<h2>Upload STL</h2>
<div class="upload">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="upload-assets">
            Name:
            <input type="text" name="name">
        </div>
        <div class="upload-assets"> 
            <label class="input-file" for="input-file">Select stl to upload (100MB max)</label>
            <input style="display: none;" id="input-file" type="file" name="upfile" id="upfile">
            <span id='file-name'></span>
            <script>
                var $input = document.getElementById('input-file'),
                        $fileName = document.getElementById('file-name');

                $input.addEventListener('change', function () {
                    $fileName.textContent = this.value;
                });
            </script>
            
        </div>
        <div class="upload-assets"> 
            <label class="input-file" for="input-file2">Select an image for your STL</label>
            <input style="display: none;" id="input-file2" type="file" name="image">
            <span id='file-name2'></span>
            <script>
                var $input2 = document.getElementById('input-file2'),
                        $fileName2 = document.getElementById('file-name2');
       
                $input2.addEventListener('change', function () {
                    $fileName2.textContent = this.value;
                });
            </script>
             
        </div>
        <div class="upload-assets"> 
            Description:
            <textarea name="description" dirname="description.dir"></textarea>
        </div>
        <div class="upload-assets">
            Category: 
            <select name="category_selected">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="upload-assets">
            <input type="submit" value="Upload" name="submit" class="btn">
        </div>
</div>    
</form>

