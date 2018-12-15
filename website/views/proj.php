<?php ?>

<h2>
    <?= $display_project['name'] ?>
</h2>


<div class="left-column">
    <img class="image" src="<?= $display_project['image_path'] ?>" alt="<?= $display_project['name'] ?>">

</div>

<div class="right-column">

    <!-- Product Description -->
    <div class="product-description">
        <span>Category:<?=$display_project['category']?></span>
        <h1><?= $display_project['name']?></h1>
        <p><?= $display_project['description']?></p>
    </div>

    <div class=""



