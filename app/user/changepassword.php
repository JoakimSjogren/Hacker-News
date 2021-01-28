<?php

declare(strict_types=1);

session_start();



if (isset($_POST['oldpassword'], $_POST['newpassword'])) {
    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $oldpassword = $_POST['oldpassword'];
    $newpassword =  password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
    $userId = $_SESSION['user']['id'];


    $statement = $pdo->prepare('SELECT password from Users WHERE id = :id');
    $statement->bindparam(':id', $userId, PDO::PARAM_STR);
    $statement->execute();



    $password = $statement->fetch(PDO::FETCH_ASSOC);

    $verify = password_verify($oldpassword, $password['password']);


    if ($verify) {
        $statement = $pdo->prepare('UPDATE Users
            SET password = :newpassword
            WHERE id = :id;');

        $statement->bindparam(':id', $userId, PDO::PARAM_INT);
        $statement->bindparam(':newpassword', $newpassword, PDO::PARAM_STR);
        $statement->execute();
        header("Location: /views/profile.php");
    } else {
        echo "Wrong password entered";
    }
}
