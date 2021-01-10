<?php
session_start();
require __DIR__ . "..//../function.php";

if (isset($_GET['id'])) {

    $postId = $_GET['id'];

    $title = $_POST['title'];
    $link = $_POST['url'];
    $description = $_POST['description'];


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

        header("Location: /index.php");
    }
}
