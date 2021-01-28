<?php

declare(strict_types=1);

session_start();

if (isset($_POST['login-email'], $_POST['login-password'])) {
    $email = filter_var($_POST['login-email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['login-password'];
    $pdo = new PDO('sqlite:../database/hacker.sqlite');


    $statement = $pdo->prepare('SELECT * from Users WHERE email = :email');
    $statement->bindparam(':email', $email, PDO::PARAM_STR);
    $statement->execute();



    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (isset($user['password']) && password_verify($password, $user['password'])) {


        $_SESSION['user'] = $user;

        header("Location: /index.php");
        exit;
    } else {
        header("Location: /views/login.php");
        exit;
    }
}
