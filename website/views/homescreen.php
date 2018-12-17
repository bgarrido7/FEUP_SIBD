<body class="home">
    <p></p>
    <img class="image-home" src="images/xmas.jpg" alt="xmas_image" />

    <h1 style="color: white;">Most Stared</h1>

    <?php
    $i = 0;

    for ($i = 0; $i < 3; $i++) {
        $project = getProjectFromId($projects[$i]['projects']);
        ?>
        <div class="container">
            <a class="image" href="view_proj.php?proj_id=<?= $project['projectid'] ?>">
                <img class="image" src="<?= $project['image_path'] ?>" alt="<?= $project['name'] ?>" >
            </a>
            <a class="image" href="view_proj.php?proj_id=<?= $project['projectid'] ?>">
                <div class="overlay">
                    <?php $stars = countStars($project['projectid']); ?>
                    <div class="text"><p> Stars:  <?= $stars['count'] ?> </p></div>

                </div> 
            </a>
        </div>

    <?php } ?>

</body>

