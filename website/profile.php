<?php
include('database/connection.php');
include('database/user.php');
if (!isset($_SESSION['username']))
    die(header('Location: index.php'));

$user = getUserByName($_SESSION['username']); 
 
include('views/header.php');
include('views/profile.php');
include('views/footer.php'); 