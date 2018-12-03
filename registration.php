<?php
extract($_POST);
if (isset($save)) {
    include('database/connection.php');
    include ('database/user.php');

    $username = strip_tags($_POST['username']);
    $password = $_POST['password'];

    if (!$username || !$password) {
        $_SESSION['error_message'] = 'All fields are mandatory!';
        $_SESSION['form_values'] = $_POST;
    } else {
        try {
            if (isset($password[2])) {
                createUser($username, $password);
                $_SESSION['success_message'] = 'User registered with success!';
            }
            else{
                $_SESSION['error_message'] = 'Password needs to be 3 characters long';
            }
        } catch (PDOException $e) {

            if (strpos($e->getMessage(), 'users_pkey') !== false)
                $_SESSION['error_message'] = 'Username already exists!';
            else
                $_SESSION['error_message'] = 'FAILLL!';

            $_SESSION['form_values'] = $_POST;
        }
    }
    header("Refresh:0");
}
?>
<section id="content">
    <h2>Register</h2>
    <form method="post">
        <label> Username:
            <input type="text" name="username" value="">
        </label>
        <label> Password:
            <input type="password" name="password">
        </label>
        <label>
            <input type="submit" value="Register" name="save" class="btn btn-success">

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
