<?php
extract($_POST);
if (isset($save)) {
    include('database/connection.php');
    include ('database/user.php');
    
    $username = strip_tags($_POST['username']);
    $password = $_POST['password'];
    $city = $_POST['city'];
    $birthday = $_POST['birthday'];
    
    if (!$username || !$password || !$city || !$birthday) {
        $_SESSION['error_message'] = 'All fields are mandatory!';
        $_SESSION['form_values'] = $_POST;
        header("Location: register.php");
    } else {
        try {
            if (isset($password[2])) {
                createUser($username, $password, $birthday, $city);
                $_SESSION['success_message'] = 'User registered with success!';
                header("Location: index.php");
            }
            else{
                $_SESSION['error_message'] = 'Password needs to be 3 characters long';
                header("Location: register.php");
            }
        } catch (PDOException $e) {
            if (strpos($e->getMessage(), 'users_pkey') !== false)
                $_SESSION['error_message'] = 'Username already exists!';
                
            else
                $_SESSION['error_message'] = 'FAILLL!';
            $_SESSION['form_values'] = $_POST;
            header("Location: register.php");
        }
    }
    
}
?>
    <h2>Register</h2>

<section class="form">
    <div class="register">
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
            <div class="register-assets">
            <label> Birthday:
                <input type="date" name="birthday">
            </label></div>
            <div class="register-assets">
            <label> City:
                <select name="city">
                    <option value="Aveiro">Aveiro</option>
                    <option value="Beja">Beja</option>
                    <option value="Braga">Braga</option>
                    <option value="Bragança">Bragança</option>
                    <option value="Castelo Branco">Castelo Branco</option>
                    <option value="Coimbra">Coimbra</option>
                    <option value="Évora">Évora</option>
                    <option value="Faro">Faro</option>
                    <option value="Guarda">Guarda</option>
                    <option value="Leiria">Leiria</option>
                    <option value="Lisboa">Lisboa</option>
                    <option value="Portalegre">Portalegre</option>
                    <option value="Porto">Porto</option>
                    <option value="Santarém">Santarém</option>
                    <option value="Setúbal">Setúbal</option>
                    <option value="Viana do Castelo">Viana do Castelo</option>
                    <option value="Vila Real">Vila Real</option>
                    <option value="Viseu">Viseu</option>
                    
                </select>
            </label></div>
            <div class="register-button">
            <label>
                <input type="submit" value="Create Account" name="save" class="btn btn-success">
            </label></div>
        
    </form></div>
</section>

</body>
</html>