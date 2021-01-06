<?php
session_start();
if (isset($_POST['username'])) {

    $newname = $_POST['username'];

    $pdo = new PDO('sqlite:../database/hacker.sqlite');
    $userId = $_SESSION['user']['id'];

    $statement = $pdo->prepare('UPDATE Users
    SET name = :newname
    WHERE id = :id');

    $statement->bindparam(':id', $userId, PDO::PARAM_INT);
    $statement->bindparam(':newname', $newname, PDO::PARAM_STR);
    $statement->execute();

    $user = $_SESSION['user'];
    $user['name'] = $newname;

    $_SESSION['user'] = $user;
    header("Location: /index.php");
}
