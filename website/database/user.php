<?php

function isValidUser($username, $password) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();

    return $user !== false && password_verify($password, $user['password']);
}

function createUser($username, $password, $birthday, $city) {
    global $conn;

    $options = [
        'cost' => 12,
    ];

    $hash = password_hash($password, PASSWORD_DEFAULT, $options);

    $stmt = $conn->prepare('INSERT INTO users VALUES (?, ?, ?, ?)');
    $stmt->execute(array($username, $hash, $birthday, $city));
}

function getUserByName($name) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute(array($name));

    $user = $stmt->fetch();

    return $user;
}

function changeCity($city, $username) {
    global $conn;

    $stmt = $conn->prepare('UPDATE users SET city = ? WHERE username= ?');
    $stmt->execute(array($city, $username));
}

function changeBirthday($birthday, $username) {
    global $conn;

    $stmt = $conn->prepare('UPDATE users SET birthday = ? WHERE username= ?');
    $stmt->execute(array($birthday, $username));
}

function changePassword($password, $username) {
    global $conn;

    $options = [
        'cost' => 12,
    ];
    $hash = password_hash($password, PASSWORD_DEFAULT, $options);

    $stmt = $conn->prepare('UPDATE users SET password = ? WHERE username= ?');
    $stmt->execute(array($hash, $username));
}

?>
