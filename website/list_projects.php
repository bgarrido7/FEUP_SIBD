<?php
include('database/connection.php');
include 'database/project.php';
include('views/header.php');

$cat_name = $_GET['cat_name'];
$products = getProjectsFromCategory($cat_name);

include('views/list_projects.php');
include('views/footer.php'); 