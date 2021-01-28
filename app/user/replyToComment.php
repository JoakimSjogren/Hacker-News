<?php

require __DIR__ . "..//../function.php";

session_start();

$commentId = $_POST['id'];
$responseContent = $_POST['content'];
$userId = $_POST['user-id'];
$postId = $_POST['post-id'];

$pdo = new PDO('sqlite:../database/hacker.sqlite');
$stmt = $pdo->prepare("INSERT INTO Comments (content, user_id, parent_comment) VALUES(:content, :userId, :parent_comment)");
$stmt->bindParam(':content', $responseContent);
$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':parent_comment', $commentId);

$stmt->execute();

header("Location: /views/post.php?id=$postId");
