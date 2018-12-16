<?php
extract($_POST);
if (isset($_POST['stared_x'])) {
    addStar($_SESSION['username'], $display_project['projectid']);
    header("Refresh:0");
}
if (isset($_POST['submit']) && strlen(($_POST['comment'])) > 1) {
    $text = $_POST['comment'];
    addComment($_SESSION['username'], $display_project['projectid'], $text);
    header("Refresh:0");
}


?>
<!--
<h2>
    <?= $display_project['name'] ?>
</h2>
-->

<div class="left-column">
    <img class="image" src="<?= $display_project['image_path'] ?>" alt="<?= $display_project['name'] ?>">

</div>

<div class="right-column">

    <!-- Product Description -->
    <div class="product-description">
        <span>Category:<?= $display_project['category'] ?></span>
        <h1><?= $display_project['name'] ?></h1>
        <p><?= $display_project['description'] ?></p>    
    </div>
    <form class="form" method="post">
       Stars:   <?= $stars['count'] ?><input type="image" src="./images/star.png" alt="stared" name="stared"> 
    </form>
    <a href="<?= $display_project['stl_path'] ?>" download>
        <button class="downloadBtn"> Download</button>
    </a>
</div>

<div class="commentWrap">
    <?php if (isset($comments[0])) { ?>

        <?php foreach ($comments as $comment) { ?>
            <div class="comments">
                <p><?= $comment['text'] ?></p>
                <span class="comments_user">By: <?= $comment['users'] ?></span>
            </div>
        <?php } ?>

    <?php } ?>

    <?php if (isset($_SESSION['username'])) { ?>
        <form class="form" method="post">
            <input type="text" name="comment" class="new_comment" placeholder="New comment...">
            <input type="submit" value="comment" name="submit" class="btn btn-success">
        </form>
    <?php } else { ?>
        <a href="login.php" id="loginReminder">
            Login to comment
        </a>

    <?php } ?>
</div>




