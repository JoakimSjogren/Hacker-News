<?php

declare(strict_types=1);

session_start();

if (isset($_POST['newemail'], $_POST['password'])) {
    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    $enteredPassword = $_POST['password'];
    $newEmail = $_POST['newemail'];

    $userId = $_SESSION['user']['id'];



    $statement = $pdo->prepare('SELECT password from Users WHERE id = :id');
    $statement->bindparam(':id', $userId, PDO::PARAM_STR);
    $statement->execute();



    $password = $statement->fetch(PDO::FETCH_ASSOC);

    $verify = password_verify($enteredPassword, $password['password']);


    if ($verify) {
        $statement = $pdo->prepare('UPDATE Users
        SET email = :newemail
        WHERE id = :id;');

        $statement->bindparam(':id', $userId, PDO::PARAM_INT);
        $statement->bindparam(':newemail', $newEmail, PDO::PARAM_STR);
        $statement->execute();
        echo "email changed!";


        $user = $_SESSION['user'];
        $user['email'] = $newEmail;

        $_SESSION['user'] = $user;

        header("Location: /views/profile.php");
    } else {
        echo "wrong password entered";
    }
}
