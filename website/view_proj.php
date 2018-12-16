<?php

include('database/connection.php');
include ('database/project.php');
include('views/header.php');

$proj_id = $_GET['proj_id'];
$display_project = getProjectFromId($proj_id);
$comments = getCommentsFromId($_GET['proj_id']);

include('views/proj.php');
include ('views/footer.php');