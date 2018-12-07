<?php

include('database/connection.php');
$username = isset($_FORM_VALUES['username'])?$_FORM_VALUES['username']:'';
?>
<html>
    <head>
        <title>STradeL</title>
   

    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" style="background:#000">
            <div class="container">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php"><strong>STradeL</strong></a></li>


                    <li><a href="index.php?option=about"> About</a></li>

                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="index.php?option=logout"> Logout</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?option=New_user"> Sign Up</a></li>
                        <li><a href="index.php?option=login"> Login</a></li>                        
                    <?php } ?>
                </ul>



            </div>
        </nav>	


        <div class="container">
            <div class="row">
                <!-- container -->
                <div class="col-sm-8">
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




                </div>
                <!-- container -->

                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Latest STLs</div>
                        <div class="panel-body">
                            this is the best website.ever.
                            you can search anything here.
                            the best.
                        </div>

                    </div>

                </div>
            </div>

        </div>



        <br/>
        <br/>
     

        <?php include('footer.php'); ?>
      



