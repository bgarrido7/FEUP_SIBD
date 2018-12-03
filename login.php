<?php
extract($_POST);
if (isset($save)) {
    include('database/connection.php');
    include ('database/user.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isValidUser($username, $password)) {
        $_SESSION['success_message'] = 'Login successful!';
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
    } else {
        $_SESSION['error_message'] = 'Login failed!';
    }
header("Refresh:0");
}
?>


<section id="content">
    <h2>Login</h2>
    <form method="post">
        <label> Username:
            <input type="text" name="username" value="">
        </label>
        <label> Password:
            <input type="password" name="password">
        </label>
        <label>
            <input type="submit" value="Login" name="save" class="btn btn-success">

        </label>
    </form>
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