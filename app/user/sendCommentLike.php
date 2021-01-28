<?php

declare(strict_types=1);

session_start();
require __DIR__ . "/../function.php";

$commentId = (int)$_GET['id'];
$userId = (int)$_SESSION['user']['id'];
$postId = (int)$_GET['post-id'];

$pdo = new PDO('sqlite:../database/hacker.sqlite');

if (hasLikedComment($commentId, $userId, 'sqlite:../database/hacker.sqlite')) { // If comment is already liked
    //Remove like
    $stmt = $pdo->prepare("DELETE FROM Comment_upvotes WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $userId);

    $stmt->execute();

    header("Location: /views/post.php?id=$postId");
}
else {
    $stmt = $pdo->prepare("INSERT INTO Comment_upvotes (comment_id, user_id) VALUES(:comment_id, :user_id)");
    $stmt->bindParam(':comment_id', $commentId);
    $stmt->bindParam(':user_id', $userId);

    $stmt->execute();

    header("Location: /views/post.php?id=$postId");
}
