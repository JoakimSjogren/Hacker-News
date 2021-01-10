<?php
session_start();
if (isset($_POST['comment'])) {

    $content = $_POST['comment'];
    $userId = $_SESSION['user']['id'];
    $postId = 1;

    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $statement = $pdo->prepare('INSERT INTO Comments(post_id, content, user_id)
    VALUES(:postId, :content, :userId)');


    $statement->bindparam(':content', $content, PDO::PARAM_STR);
    $statement->bindparam(':userId', $userId, PDO::PARAM_INT);
    $statement->bindparam(':postId', $postId, PDO::PARAM_INT);

    $statement->execute();

    header("Location: /index.php");
}
