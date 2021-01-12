<?php
session_start();
if (isset($_POST['title'], $_POST['url'], $_POST['description'])) {

    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
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
