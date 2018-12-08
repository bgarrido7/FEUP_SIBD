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
    } else {
        try {
            if (isset($password[2])) {
                createUser($username, $password, $birthday, $city);
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
    header("Location: index.php");
}
?>
<section class="form">
    <h2>Register</h2>
    <form method="post">
        <label> Username:
            <input type="text" name="username" value="">
        </label>
        <label> Password:
            <input type="password" name="password">
        </label>
        <label> Birthday:
            <input type="date" name="birthday">
        </label>
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
        </label>
        <label>
            <input type="submit" value="Register" name="save" class="btn btn-success">

        </label>
    </form>
</section>

</body>
</html>
