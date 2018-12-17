<?php
extract($_POST);
if (isset($city_submit)) {
    changeCity($city, $user['username']);
    $_SESSION['success_message'] = 'City Updated!';
    header("Refresh:0");
}

if (isset($birthday_submit)) {
    changeBirthday($birthday, $user['username']);
    $_SESSION['success_message'] = 'Birthday Updated!';
    header("Refresh:0");
}

if (isset($password_submit)) {
    if (isValidUser($user['username'], $password_old)) {
        if ($password_new1 == $password_new2) {
            changePassword($password_new1, $user['username']);
            $_SESSION['success_message'] = 'Password Updated!';
            header("Refresh:0");
            
        } else {
            $_SESSION['error_message'] = 'Passwords do not match!';
            header("Refresh:0");
        }
    } else {
        $_SESSION['error_message'] = 'Old Password incorrect!';
        header("Refresh:0");
    }
}
?>

<h2>User Area</h2>

<div class="edit-menu">
    <div class="vertical-menu">
        <a class="active" >Edit Profile</a>
        <a href="#" onclick="EditPicture()">Change Picture</a>
        <a href="#" onclick="EditCity()">Change City</a>
        <a href="#" onclick="EditBirth()">Change Birthdate</a>
        <a class="active">Security</a>
        <a href="#" onclick="EditPass()">Change Password</a>
        <a class="delete" href="#">Delete Account</a>
    </div>

    <div class="info-menu"  id="allinfo">

    <img class="info-img" src="images/person.jpg" >

                <p>Name: <?= $user['username'] ?></p>
                <p>City: <?= $user['city'] ?></p>
                <p>Birthday: <?= $user['birthday'] ?></p>
             
    </div>

    <div class="upload-assets" id="edit-picture">
    <label class="input-file" for="input-file">Upload new Picture</label>
            <input style="display: none;" id="input-file" type="file" name="upfile" id="upfile">
            <span id='file-name'></span>
            <script>
                var $input = document.getElementById('input-file'),
                        $fileName = document.getElementById('file-name');

                $input.addEventListener('change', function () {
                    $fileName.textContent = this.value;
                });
            </script>
                 <input type="submit" value="Update Account" name="city_submit" class="btn-update">
           
    </div>


    <div class="vertical-menu-right" id="edit-city">  
        <form method="post"> 
            <div class="update-assets">
                <label>
                    Change City:
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
                <input type="submit" value="Update Account" name="city_submit" class="btn-update">
            </div>
        </form>
    </div>

    <div class="vertical-menu-right" id="edit-birth">
        <form method="post"> 
            <div class="update-assets">

                <label>Change Birthday:
                    <input type="date" name="birthday">
                </label>
                <input type="submit" value="Update Account" name="birthday_submit" class="btn-update">
            </div>
        </form>
    </div>

    <div  class="vertical-menu-right" id="security">
        <form method="post"> 
            <div class="update-assets">
                <label>Current Password:
                    <input type="password" name="password_old">
                </label>
            </div>
            <div class="update-assets">
                <label>New Password:
                    <input type="password" name="password_new1">
                </label>
            </div>
            <div class="update-assets">
                <label>Repeat New Password:
                    <input type="password" name="password_new2">
                </label>
            </div>
            <input type="submit" value="Update Account" name="password_submit" class="btn-update">

        </form>
    </div>

</div>

<script>

    function EditPicture() {
        var pic = document.getElementById("edit-picture");
        var city = document.getElementById("edit-city");
        var birth = document.getElementById("edit-birth");
        var pass = document.getElementById("security");
        var info = document.getElementById("allinfo");
        
        info.style.display = "none";
        if (pass.style.display === "block"){
            pass.style.display = "none";
        }
        if (city.style.display === "block") {
            city.style.display = "none";
        }
        if (birth.style.display === "block") {
            birth.style.display = "none";
        }
        pic.style.display = "block";
    }
    function EditCity() {
        var pic = document.getElementById("edit-picture");
        var city = document.getElementById("edit-city");
        var birth = document.getElementById("edit-birth");
        var pass = document.getElementById("security");
        var info = document.getElementById("allinfo");
        
        info.style.display = "none";
        if (pic.style.display === "block"){
            pic.style.display = "none";
        }
        if (pass.style.display === "block") {
            pass.style.display = "none";
        }
        if (birth.style.display === "block") {
            birth.style.display = "none";
        }
        city.style.display = "block";
    }
    function EditBirth() {
        var pic = document.getElementById("edit-picture");
        var city = document.getElementById("edit-city");
        var birth = document.getElementById("edit-birth");
        var pass = document.getElementById("security");
        var info = document.getElementById("allinfo");
        
        info.style.display = "none";
        if (pic.style.display === "block"){
            pic.style.display = "none";
        }
        if (city.style.display === "block") {
            city.style.display = "none";
        }
        if (pass.style.display === "block") {
            pass.style.display = "none";
        }
        birth.style.display = "block";
    }
    function EditPass() {
        var pic = document.getElementById("edit-picture");
        var city = document.getElementById("edit-city");
        var birth = document.getElementById("edit-birth");
        var pass = document.getElementById("security");
        var info = document.getElementById("allinfo");
        
        info.style.display = "none";
        if (pic.style.display === "block"){
            pic.style.display = "none";
        }
        if (city.style.display === "block") {
            city.style.display = "none";
        }
        if (birth.style.display === "block") {
            birth.style.display = "none";
        }
        pass.style.display = "block";
    }
</script>
