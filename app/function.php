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
    $pdo = new PDO('sqlite:../app/database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Posts where id = :id');
    $statement->bindparam(':id', $id, PDO::PARAM_INT);
    $statement->execute();


    $post = $statement->fetchALL();

    return $post[0];
}

function getCommentsByPostId(int $id)
{
    $pdo = new PDO('sqlite:../app/database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Comments where post_id = :id');
    $statement->bindparam(':id', $id, PDO::PARAM_INT);
    $statement->execute();


    $post = $statement->fetchALL();

    return $post;
}


function getUserById(int $id)
{
}

function findImageById($id) {
    
    $image = "..//./app/database/profileimages/$id.png";
    if (file_exists($image)) {
   
       $imageData = base64_encode(file_get_contents($image));
     $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
     }
     else {
        $image = "..//./app/database/profileimages/default.png";
        $imageData = base64_encode(file_get_contents($image));
        $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
       
     }

     return $src;
    }
    
    
   

