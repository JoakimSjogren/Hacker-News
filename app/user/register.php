<?php

if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $pdo = new PDO('sqlite:hacker.sqlite');

    $statement = $pdo->prepare("INSERT INTO 
    Users (email, password, name, biography, id)
    VALUES (:email, :hashedPassword, 'daphne nikolaus', 'lorem Ipsum', 21)");
    $statement->execute();
    
    $content = $pdo->query('SELECT * FROM Users');
}