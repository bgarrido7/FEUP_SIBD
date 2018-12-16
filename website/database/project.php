<?php

function createProject($username, $name, $description, $image_path, $stl_path, $category) {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO projects VALUES (DEFAULT, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $username, $description, $image_path, $category, $stl_path));
    return 1;
}

function getProjectsFromCategory($cat_name) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM projects WHERE category = ?');
    $stmt->execute(array($cat_name));
    return $stmt->fetchAll();
}

function getProjectFromId($proj_id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM projects WHERE projectid = ?');
    $stmt->execute(array($proj_id));
    return $stmt->fetch();
}

function getCommentsFromId($proj_id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comments WHERE projects = ?');
    $stmt->execute(array($proj_id));
    return $stmt->fetchAll();
}

function addComment($user, $proj_id, $comment) {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO comments VALUES (?, ?, ?)');
    $stmt->execute(array($user, $proj_id, $comment));
    return 1;
}

function addStar($user, $proj_id) {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO stared VALUES (?, ?)');
    $stmt->execute(array($user, $proj_id));
    return 1;
}

function removeStar($user, $proj_id) {
    global $conn;

    $stmt = $conn->prepare('DELETE FROM stared WHERE users = ?  AND projects = ? ');
    $stmt->execute(array($user, $proj_id));
    return 1;
}

function isAlreadyStared($user, $proj_id) {
    global $conn;

    $stmt = $conn->prepare('SELECT users FROM stared WHERE users = ? AND projects = ?');
    $stmt->execute(array($user, $proj_id));

    if (null != $stmt->fetch()) {
        return 1;
    }
    return 0;
}


function countStars($proj_id) {
    global $conn;

    $stmt = $conn->prepare('SELECT COUNT (DISTINCT users) FROM stared WHERE projects = ? ');
    $stmt->execute(array($proj_id));
    return $stmt->fetch();
}

?>
