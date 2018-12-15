<?php

include('database/connection.php');
include ('database/project.php');
include('views/header.php');

$display_project = getProjectFromId($_GET['proj_id']);
include('views/proj.php');
include ('views/footer.php');