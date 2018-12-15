<?php ?>
<h2>
    Category: <?= $cat_name ?>
</h2>

<div class="row">
    <?php foreach ($products as $product) { ?>
        <div class="column">
            <h1><?= $product['name'] ?></h1>
            <a class="image" href="view_proj.php?proj_id=<?php $product['projectid'] ?>">
                <img class="image" src="<?= $product['image_path'] ?>" alt="pokemon_image" >
            </a>
            <p><?= $product['description'] ?></p>

        </div>
    <?php } ?>
</div>


