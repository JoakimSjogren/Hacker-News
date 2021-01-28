<?php

declare(strict_types=1);

session_start();

if (isset($_POST['title'], $_POST['url'], $_POST['description'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $url = $_POST['url'];
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $userId = $_SESSION['user']['id'];
    $date = date("Y-m-d H:i:s", time());

    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $statement = $pdo->prepare('INSERT INTO Posts(user_id, description, created_at, title, link, uppvotes)
    VALUES(:userid, :description, :date, :title, :url, 0)');

    $statement->bindparam(':title', $title, PDO::PARAM_STR);
    $statement->bindparam(':url', $url, PDO::PARAM_STR);
    $statement->bindparam(':date', $date, PDO::PARAM_STR);
    $statement->bindparam(':description', $description, PDO::PARAM_STR);
    $statement->bindparam(':userid', $userId, PDO::PARAM_INT);

    $statement->execute();

    header("Location: /index.php");
}
