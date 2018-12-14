<?php

function getAllCategories() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM category');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getCategoryByName($name) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM category WHERE name = ?');
    $stmt->execute(array($name));
    return $stmt->fetch();
}
