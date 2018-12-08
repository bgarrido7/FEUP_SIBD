<h2>Profile</h2>

<div class="profile_left">
    <ul class="profile_sidebar">
        <li class="active">
            <a>
            Upload STL </a>
        </li>
        <li>

            <a href="<?php $action=pwdchange ?>">

                Change password</a>
        </li>
        <li>
            <a href="#">

                Tasks </a>
        </li>
        <li>
            <a href="#">

                Help </a>
        </li>
    </ul>
</div>
<div>



    <?php
    
    @$action = $_GET['action'];
    echo $action;
    if ($action != "") {
        if ($action == "pwdchange") {
            include('pwd_change.php');
        }
    } else {
        echo "não entrou";
    }
    ?>

</div>





</body>
</html>