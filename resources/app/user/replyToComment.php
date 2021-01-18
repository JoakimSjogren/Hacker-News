<?php
require __DIR__ . "..//../function.php";

session_start();

$commentId = $_POST['id'];
$responseContent = $_POST['content'];
$userId = $_POST['user-id'];

$pdo = new PDO('sqlite:../database/hacker.sqlite');
$stmt = $pdo->prepare("INSERT INTO Comments (content, user_id, parent_comment) VALUES(:content, :user_id, :parent_comment)");
$stmt->bindParam(':content', $responseContent);
$stmt->bindParam(':user_id', $userId);
$stmt->bindParam(':parent_comment', $commentId);
$stmt->execute();
