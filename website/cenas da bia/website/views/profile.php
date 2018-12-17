<h2>User Area</h2>

<div class="edit-menu">
    <div class="vertical-menu">
        <a class="active" onclick="EditProfile()">Edit Profile</a>
        <a href="#">Change Picture</a>
        <a href="#">Change City</a>
        <a href="#">Change Birthdate</a>
        <a class="active" onclick="EditPass()">Security</a>
        <a href="#">Change Password</a>
        <a class="active">View Projects</a>
        <a href="#">On Whishlist</a>
        <a href="#">Uploaded Files</a>
        <a class="delete" href="#">Delete Account</a>
    </div>

    <div class="vertical-menu-right" id="edit-profile">
        <form>
            <div class="update-assets">
                <label>  
                    Upload a new Picture:
                    <input type="file" name="upfile" id="upfile">
                </label>
            </div>
            <div class="update-assets">
                <label>Change City:
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
            </div>
            <div class="update-assets">
                <label>Change Birthday:
                    <input type="date" name="birthday">
                </label>
            </div>
            <input type="submit" value="Update Account" name="submit" class="btn-update">
        </form>
    </div>

    <div  class="vertical-menu-right" id="security">
        <form>
            <div class="update-assets">
                <label>Current Password:
                    <input type="password" name="password">
                </label>
            </div>
            <div class="update-assets">
                <label>New Password:
                    <input type="password" name="password">
                </label>
            </div>
            <div class="update-assets">
                <label>Repeat New Password:
                    <input type="password" name="password">
                </label>
            </div>
                <input type="submit" value="Update Account" name="submit" class="btn-update">
            
        </form>
    </div>
</div>
<script>
    function EditProfile() {
        var x = document.getElementById("edit-profile");
        var y = document.getElementById("security");
        if (y.style.display === "block"){
            y.style.display = "none";
        }
        x.style.display = "block";
    }
    function EditPass() {
        var x = document.getElementById("edit-profile");
        var y = document.getElementById("security");
        if (x.style.display === "block"){
            x.style.display = "none";
        }
        y.style.display = "block";
    }
</script>
