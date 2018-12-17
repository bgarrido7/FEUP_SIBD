<?php
include('database/connection.php');
include ('database/project.php');
include('views/header.php');

$search = $_GET['search'];
$projects = searchProject($search);

include('views/search.php');
include('views/footer.php'); 