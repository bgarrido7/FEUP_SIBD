<?php
include('database/connection.php');
if (!isset($_SESSION['username']))
    die(header('Location: index.php'));
include('views/header.php');
include('views/upload.php');
include('views/footer.php'); 