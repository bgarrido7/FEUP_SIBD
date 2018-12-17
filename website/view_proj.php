<?php
include('database/connection.php');
include ('database/project.php');
include('views/header.php');

$proj_id = $_GET['proj_id'];
$stars = countStars($proj_id);
$display_project = getProjectFromId($proj_id);
$comments = getCommentsFromId($_GET['proj_id']);

if (isset($_SESSION['username']))
    include('views/proj.php');

else {
    ?>
    <a class="login-to" href = "login.php" id = "loginReminder">
        Login to proceeded
    </a>
    <?php
}

include ('views/footer.php');
