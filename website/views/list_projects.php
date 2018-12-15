<?php ?>
<h2>
    Category: <?= $cat_name ?>
</h2>

<?php if (isset($projects[0])) { ?>

    <div class="column right">
        <?php foreach ($projects as $project) { ?>
            <div class="row">
                <h1><?= $project['name'] ?></h1>
                <a class="image" href="view_proj.php?proj_id=<?= $project['projectid'] ?>">
                    <img class="image" src="<?= $project['image_path'] ?>" alt="<?= $project['name'] ?>" >
                </a>
                <p class="description"><?= $project['description'] ?></p>

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
        No projects within this category
    </div>

<?php } ?>

