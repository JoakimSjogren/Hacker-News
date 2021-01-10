<?php
session_start();
require __DIR__ . "..//../function.php";

if (isset($_GET['id'])) {
    $postId = $_GET['id'];


    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Posts where id = :id');
    $statement->bindparam(':id', $postId, PDO::PARAM_INT);
    $statement->execute();


    $post = $statement->fetchALL();


    die(var_dump($post));


    // if ($_SESSION['user']['id'] === )
}
