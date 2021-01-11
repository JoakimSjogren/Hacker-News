<?php
session_start();
require __DIR__ . "..//../function.php";

if (isset($_GET['id'])) {

    $postId = $_GET['id'];


    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Posts where id = :id');
    $statement->bindparam(':id', $postId, PDO::PARAM_INT);
    $statement->execute();


    $postInfo = $statement->fetchALL(PDO::FETCH_ASSOC);



    //check if logged in user posted the post
    if ($_SESSION['user']['id'] === $postInfo[0]['user_id']) {
        $statement = $pdo->prepare('DELETE FROM Posts
        WHERE id = :id');
        $statement->bindparam(':id', $postId, PDO::PARAM_INT);
        $statement->execute();

        $statement = $pdo->prepare('DELETE FROM Comments
        WHERE post_id = :id');
        $statement->bindparam(':id', $postId, PDO::PARAM_INT);
        $statement->execute();

        $statement = $pdo->prepare('DELETE FROM Uppvotes
        WHERE post_id = :id');
        $statement->bindparam(':id', $postId, PDO::PARAM_INT);
        $statement->execute();

        header("Location: /index.php");
    }
}
