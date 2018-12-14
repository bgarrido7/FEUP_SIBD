<?php

  function createProject($username, $name, $description, $image_path, $stl_path, $category) {
    global $conn;
    
    $stmt = $conn->prepare('INSERT INTO projects VALUES (DEFAULT, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array( $name, $username, $description, $image_path, $category, $stl_path));
    return 1;
  }

?>
