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
header("Location: index.php");

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
    

</section>

</body>
</html>