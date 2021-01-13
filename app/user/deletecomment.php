<?php

declare(strict_types=1);
session_start();

require __DIR__ . "..//../function.php";

if (isset($_GET['id'])) {

    $commentId = $_GET['id'];


    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Comments where id = :id');
    $statement->bindparam(':id', $commentId, PDO::PARAM_INT);
    $statement->execute();


    $commentInfo = $statement->fetchALL(PDO::FETCH_ASSOC);
    $postId = $commentInfo[0]['post_id'];


    //check if logged in user posted the comment
    if ($_SESSION['user']['id'] === $commentInfo[0]['user_id']) {
        $statement = $pdo->prepare('DELETE FROM Comments
        WHERE id = :id');
        $statement->bindparam(':id', $commentId, PDO::PARAM_INT);
        $statement->execute();
        header("Location: /views/post.php?id=" . $postId);
    } else {
        header("Location: /index.php");
    }
}
