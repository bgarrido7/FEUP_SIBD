<?php

include('database/connection.php');
include('database/project.php');
include('views/header.php');

$projects = getProjectsMostStared();
include('views/homescreen.php');
include('views/footer.php');
?>
