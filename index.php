<?php

include('database/connection.php');
$username = isset($_FORM_VALUES['username'])?$_FORM_VALUES['username']:'';
?>
<html>
    <head>
        <title>STradeL</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <script src="js/jquery_library.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" style="background:#000">
            <div class="container">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php"><strong>STradeL</strong></a></li>


                    <li><a href="index.php?option=about"><span class="glyphicon glyphicon-user"></span> About</a></li>

                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="index.php?option=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?option=New_user"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="index.php?option=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>                        
                    <?php } ?>
                </ul>



            </div>
        </nav>	


       
          <div class="container-fluid">
          <!-- slider -->
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
          <div class="item active">
          <img src="images/dragon.jpg" alt="...">
          <div class="carousel-caption">
          ...
          </div>
          </div>
          <div class="item">
          <img src="images/groot.jpg" alt="...">
          <div class="carousel-caption">
          ...
          </div>
          </div>

          <div class="item">
          <img src="images/pokemon.jpg" alt="...">
          <div class="carousel-caption">
          ...
          </div>
          </div>
          ...
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
          </a>
          </div>
          <!-- slider end-->
          </div>
     

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
      



