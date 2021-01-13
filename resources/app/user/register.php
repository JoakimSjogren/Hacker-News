<?php

declare(strict_types=1);
session_start();

if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    //Check if email already exists
    $statement =  $pdo->query('SELECT email from Users where email = :email');
    $statement->bindparam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $emailTaken = $statement->fetchALL();

    if (!$emailTaken) {
        $statement = $pdo->prepare("INSERT INTO 
        Users (email, password)
        VALUES (:email, :password)");
        $statement->bindparam(':email', $email, PDO::PARAM_STR);
        $statement->bindparam(':password', $hashedPassword, PDO::PARAM_STR);
        $statement->execute();



        $statement = $pdo->prepare('SELECT * from Users WHERE email = :email');
        $statement->bindparam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $user;





        header("Location: /index.php");
    } else {
        //Email already taken
        $_SESSION['error'] = "Email already taken";
        header("Location: /views/login.php");
    }
}
