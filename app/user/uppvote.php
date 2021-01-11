<?php
session_start();


if (isset($_GET['id'])) {

    $userId = $_SESSION['user']['id'];
    $postId = $_GET['id'];

    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    //check if already uppvoted or not
    $statement =  $pdo->query('SELECT * from Uppvotes where user_id = :userId and post_id = :postId');
    $statement->bindparam(':userId', $userId, PDO::PARAM_STR);
    $statement->bindparam(':postId', $postId, PDO::PARAM_STR);
    $statement->execute();
    $uppvoted = $statement->fetchALL();

    // die(var_dump($uppvoted[0][0]));
    //Uppvote
    if ($uppvoted[0][0] === null) {
        $statement = $pdo->query('INSERT INTO Uppvotes (user_id, post_id)
        VALUES (:userId, :postId)');
        $statement->bindparam(':userId', $userId, PDO::PARAM_STR);
        $statement->bindparam(':postId', $postId, PDO::PARAM_STR);
        $statement->execute();
        $uppvoted = $statement->fetchALL();

        $statement = $pdo->query('UPDATE Posts SET uppvotes = uppvotes + 1 where id = :id');
        $statement->bindparam(':id', $postId, PDO::PARAM_STR);
        $statement->execute();


        // UPDATE Products SET Price = Price + 50 WHERE ProductID = 1

    }
    //Remove Uppvote

    else {
        $statement = $pdo->query('DELETE FROM Uppvotes WHERE user_id = :userId and post_id = :postId');
        $statement->bindparam(':userId', $userId, PDO::PARAM_STR);
        $statement->bindparam(':postId', $postId, PDO::PARAM_STR);
        $statement->execute();


        $statement = $pdo->query('UPDATE Posts SET uppvotes = uppvotes - 1 where id = :id');
        $statement->bindparam(':id', $postId, PDO::PARAM_STR);
        $statement->execute();
    }
    header("Location: /views/post.php?id=" . $postId);
}
