<?php

declare(strict_types=1);
session_start();

require __DIR__ . "..//../function.php";

if (isset($_GET['id'])) {

    $postId = $_GET['id'];

    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $link = filter_var($_POST['url'], FILTER_SANITIZE_URL);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);


    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Posts where id = :id');
    $statement->bindparam(':id', $postId, PDO::PARAM_INT);
    $statement->execute();


    $postInfo = $statement->fetchALL(PDO::FETCH_ASSOC);


    //check if logged in user posted the post
    if ($_SESSION['user']['id'] === $postInfo[0]['user_id']) {
        $statement = $pdo->prepare('UPDATE Posts SET title = :title, link = :link, description = :description where id = :id');

        $statement->bindparam(':id', $postId, PDO::PARAM_INT);
        $statement->bindparam(':title', $title, PDO::PARAM_STR);
        $statement->bindparam(':description', $description, PDO::PARAM_STR);
        $statement->bindparam(':link', $link, PDO::PARAM_STR);
        $statement->execute();

        header("Location: /views/post.php?id=" . $postId);
    }
}
