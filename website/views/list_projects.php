<?php ?>
<h2>
    Category: <?= $cat_name ?>
</h2>

<?php if (isset($products[0])) { ?>

    <div class="column right">
        <?php foreach ($products as $product) { ?>
            <div class="row">
                <h1><?= $product['name'] ?></h1>
                <a class="image" href="view_proj.php?proj_id=<?php $product['projectid'] ?>">
                    <img class="image" src="<?= $product['image_path'] ?>" alt="pokemon_image" >
                </a>
                <p><?= $product['description'] ?></p>

            </div>
        <?php } ?>
    </div>

    <div class="column left">
        <div class="">
            filter
        </div>


    </div>
<?php } else { ?>
    <div class="column right">
           No projects within this category;
    </div>

<?php } ?>

