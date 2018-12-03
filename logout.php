<?php

if(isset($_SESSION['username']) && $_SESSION['username']) {
    session_destroy();
    $_SESSION['success_message'] = 'Logout successful!';
    $_SESSION['loggedin']==false;
    header("Location: index.php");
}
?>

