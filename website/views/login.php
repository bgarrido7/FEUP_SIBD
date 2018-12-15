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
        header("Location: index.php");
    } else {
        $_SESSION['error_message'] = 'Login failed!';
        header("Location: login.php");
   }
    
}
?>


<section id="content">
    <h2>Login</h2>
    <div class="login">
        <img class="image-logo" src="images/logoFinal.PNG"   alt="logo_image" >
       <form method="post">
       <div class="register-assets">

           <label> Username:
                <input type="text" name="username" value="">
            </label></div>
        <div class="register-assets">

           <label> Password:
                <input type="password" name="password">
            </label></div>
           <label>
                <input type="submit" value="Login" name="save" class="login-btn btn-success">
        </label></div>
        </form>
    </div>

</section>

</body>
</html>