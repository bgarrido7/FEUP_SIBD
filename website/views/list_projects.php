<?php ?>
<h2>
    Category: <?= $cat_name ?>
</h2>

<?php if (isset($projects[0])) { ?>

    <div class="column">
        <?php foreach ($projects as $project) { ?>
            <div class="row">
                <h1><?= $project['name'] ?></h1>
                <a class="image" href="view_proj.php?proj_id=<?= $project['projectid'] ?>">
                    <img class="image projects" src="<?= $project['image_path'] ?>" alt="<?= $project['name'] ?>" >
                </a>
                <h3>Description</h3>
                <?php $stars = countStars($project['projectid']); ?>
                <input type="image" src="./images/star.png" alt="stared" name="stared"> :  <?= $stars['count'] ?>
                <p class="description"><?= $project['description'] ?></p>

            </div>
        <?php } ?>
    </div>

<?php } else { ?>
    <div>
        No projects within this category
    </div>

<?php } ?>

