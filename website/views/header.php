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
                    <li><a href="search.php"> Search</a></li>
                    <li><div class="dropdown">
                            <button class="dropbtn">Categories
                            </button>
                            <div class="dropdown-content">
                                <?php
                                include ('database/category.php');
                                $categories = getAllCategories();
                                foreach ($categories as $category) {
                                    ?>
                                    <a href="list_projects.php?cat_name=<?= $category['name'] ?>"><?= $category['name'] ?></a>
<?php } ?>

                            </div>
                        </div> 
                    </li>
                </ul>



                <ul class="navbar navbar-top navbar-right">
<?php if (isset($_SESSION['username'])) { ?>
                        <li><a href="upload.php"> Upload STL</a></li>
                        <li><a href="profile.php"> Profile</a></li>
                        <li><a href="logout.php"> Logout</a></li>
<?php } else { ?>
                        <li><a href="register.php"> Sign Up</a></li>
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
    </body>
