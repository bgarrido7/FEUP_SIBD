<?php
include('database/connection.php');
include ('database/project.php');
include('views/header.php');

$search = $_GET['search'];
$projects = searchProject($search);

if (isset($_SESSION['username']))
    include('views/search.php');

else {
    ?>
    <a class="login-to" href = "login.php" id = "loginReminder">
        Login to proceeded
    </a>
    <?php
}
include('views/footer.php'); 