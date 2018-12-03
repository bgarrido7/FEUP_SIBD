<?php

if(isset($_SESSION['username']) && $_SESSION['username']) {
    session_destroy();
    $_SESSION['success_message'] = 'Logout successful!';
    $_SESSION['loggedin']==false;
    header("Location: index.php");
}
?>

<section id="content">
   
    <?php if (isset($_ERROR_MESSAGE)) { ?>
        <div id="errors">
            <?= $_ERROR_MESSAGE ?>  
        </div>
    <?php } ?>

    <?php if (isset($_SUCCESS_MESSAGE)) { ?>
        <div id="success">
            <?= $_SUCCESS_MESSAGE ?>  
        </div>
    <?php } ?>

</section>

</body>
</html>

