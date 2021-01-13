<?php

declare(strict_types=1);
// require __DIR__ . "/autoload.php";


function getPostsByNewest()
{

    $pdo = new PDO('sqlite:./app/database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * FROM Posts ORDER BY date(created_at) ASC');
    $statement->execute();


    $post = $statement->fetchALL();

    return $post;
}

function getPostsByMostUppvotes()
{
    $pdo = new PDO('sqlite:../app/database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * FROM Posts order by uppvotes DESC');
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

function getCommentById(int $id)
{
    $pdo = new PDO('sqlite:../app/database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Comments where id = :id');
    $statement->bindparam(':id', $id, PDO::PARAM_INT);
    $statement->execute();


    $comment = $statement->fetchALL(PDO::FETCH_ASSOC);

    return $comment[0];
}




function findImageById($id)
{

    $image = "..//./app/database/profileimages/$id.png";
    if (file_exists($image)) {

        $imageData = base64_encode(file_get_contents($image));
        $src = 'data: ' . mime_content_type($image) . ';base64,' . $imageData;
    } else {
        $image = "..//./app/database/profileimages/default.png";
        $imageData = base64_encode(file_get_contents($image));
        $src = 'data: ' . mime_content_type($image) . ';base64,' . $imageData;
    }

    return $src;
}

function getUppvoteAmountById($id)
{
    $pdo = new PDO('sqlite:../app/database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Posts where id = :id');
    $statement->bindparam(':id', $id, PDO::PARAM_INT);
    $statement->execute();


    $post = $statement->fetchALL(PDO::FETCH_ASSOC);

    return $post[0];
}


function checkIfPostIsUpvoted($postId)
{
    if (isset($_SESSION['user'])) {
        $pdo = new PDO('sqlite:../app/database/hacker.sqlite');
        $userId = $_SESSION['user']['id'];

        $statement = $pdo->prepare('SELECT * from Uppvotes where post_id = :postId and user_id = :userId');
        $statement->bindparam(':postId', $postId, PDO::PARAM_INT);
        $statement->bindparam(':userId', $userId, PDO::PARAM_INT);
        $statement->execute();


        $post = $statement->fetchALL(PDO::FETCH_ASSOC);

        if (count($post) > 0) {
            return $post[0];
        } else {
            return $post;
        }
    }
}


function getUserById(int $userId)
{
    $pdo = new PDO('sqlite:../app/database/hacker.sqlite');

    $statement = $pdo->prepare('SELECT * from Users where id = :userId');
    $statement->bindparam(':userId', $userId, PDO::PARAM_INT);
    $statement->execute();


    $post = $statement->fetchALL(PDO::FETCH_ASSOC);

    return $post[0];
}
