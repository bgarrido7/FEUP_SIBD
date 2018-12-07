<?php
include('database/connection.php');
$username = isset($_FORM_VALUES['username']) ? $_FORM_VALUES['username'] : '';
?>
<html>
    <head>
        <title>STradeL</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <nav>
            <div>

                <ul class="navbar navbar-top navbar-left">
                    <li><a href="index.php"><strong>STradeL</strong></a></li>


                    <li><a href="index.php?option=about"> About</a></li>

                </ul>


                <ul class="navbar navbar-top navbar-right">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="index.php?option=logout"> Logout</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?option=New_user"> Sign Up</a></li>
                        <li><a href="index.php?option=login"> Login</a></li>                        
                    <?php } ?>
                </ul>



            </div>
        </nav>	


        <div>
            <div>


                <?php
                @$opt = $_GET['option'];

                if ($opt != "") {
                    if ($opt == "about") {
                        include('about.php');
                    } else if ($opt == "New_user") {
                        include('registration.php');
                    } else if ($opt == "login") {
                        include('login.php');
                    } else if ($opt == "logout") {
                        include('logout.php');
                    }
                } else {
                    echo "<h2></h2>
				Welcome 
		Welcome user Welcome user Welcome user Welcome user Welcome user Welcome user user";
                }
                ?>

                <!--Secção de debug-->
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






                <div>
                    <div>Latest STLs</div>
                    <div>
                        this is the best website.ever.
                        you can search anything here.
                        the best.
                    </div>

                </div>


            </div>

        </div>



        <br/>
        <br/>


        <?php include('footer.php'); ?>
      



