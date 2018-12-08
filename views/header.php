<html>
    <head>
        <title>STradeL</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <nav>
            <div class="navbar navbar-top">

                <ul class="navbar navbar-top navbar-left">
                    <li><a href="index.php"><strong>STradeL</strong></a></li>


                    <li><a href="index.php?option=about"> About</a></li>

                </ul>


                <ul class="navbar navbar-top navbar-right">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="index.php?option=logout"> Logout</a></li>
                        <li><a href="index.php?option=profile"> Profile</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?option=New_user"> Sign Up</a></li>
                        <li><a href="login.php"> Login</a></li>                        
                    <?php } ?>
                </ul>



            </div>
        </nav>	


        <div>
            <div class="messages">
                <?php if (isset($_ERROR_MESSAGE)) { ?>
                    <div class="message errors">
                        <?= $_ERROR_MESSAGE ?>  
                    </div>
                <?php } ?>

                <?php if (isset($_SUCCESS_MESSAGE)) { ?>
                    <div class="message success">
                        <?= $_SUCCESS_MESSAGE ?>  
                    </div>
                <?php } ?>

            </div>

        </div>