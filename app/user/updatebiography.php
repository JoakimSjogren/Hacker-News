<?php
session_start();
if (isset($_POST['biography'])) {
    $newBiography = $_POST['biography'];

    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $userId = $_SESSION['user']['id'];

    $statement = $pdo->prepare('UPDATE Users
    SET biography = :newbiography
    WHERE id = :id');

    $statement->bindparam(':id', $userId, PDO::PARAM_INT);
    $statement->bindparam(':newbiography', $newBiography, PDO::PARAM_STR);
    $statement->execute();


    $user = $_SESSION['user'];
    $user['biography'] = $newBiography;

    $_SESSION['user'] = $user;

    header("Location: /views/profile.php");
}
