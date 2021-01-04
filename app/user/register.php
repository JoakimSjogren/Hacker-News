<?php

if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $pdo = new PDO('sqlite:../database/hacker.sqlite');

    

    $statement = $pdo->prepare("INSERT INTO 
    Users (email, password, name, biography, id)
    VALUES (:email, :password, 'daphne nikolaus', 'lorem Ipsum', 21)");
    $statement->bindparam(':email', $email, PDO::PARAM_STR);
    $statement->bindparam(':password', $hashedPassword, PDO::PARAM_STR);
    $statement->execute();
    
}