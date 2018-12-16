<?php
extract($_POST);

if (isset($_POST['submit'])) {
    $text = $_POST['comment'];
    addComment($_SESSION['username'], $display_project['projectid'], $text);
    header("Refresh:0");
}
?>

<h2>
    <?= $display_project['name'] ?>
</h2>


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
</div>

<div class="commentWrap">
    <?php if (isset($comments[0])) { ?>
        <div class="comments">
            <?php foreach ($comments as $comment) { ?>
                <p><?= $comment['text'] ?></p>
                <span class="comments_user">By: <?= $comment['users'] ?></span>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (isset($_SESSION['username'])) { ?>
        <form method="post">
            <input type="text" name="comment" class="new_comment" placeholder="New comment...">
            <input type="submit" value="comment" name="submit" class="login-btn btn-success">
        </form>
    <?php } else { ?>
        <a href="login.php" id="loginReminder">
            Login to comment
        </a>

    <?php } ?>
</div>




