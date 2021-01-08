<?php

declare(strict_types=1);
session_start();


function getPosts()
{

    $pdo = new PDO('sqlite:./app/database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Posts');
    $statement->execute();


    $post = $statement->fetchALL();

    return $post;
}


function getPostById(int $id)
{

    // $title;
    // $Link;
    // $user_Id;

}
