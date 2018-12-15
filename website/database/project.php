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

function getProjectFromId($proj_id){
     global $conn;

    $stmt = $conn->prepare('SELECT * FROM projects WHERE projectid = ?');
    $stmt->execute(array($proj_id));
    return $stmt->fetch();
    
}
?>
