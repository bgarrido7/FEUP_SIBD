<?php

function getAllCategories() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM category');
    $stmt->execute();
    return $stmt->fetchAll();
}
