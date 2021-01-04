<?php

declare(strict_types=1);
session_start();


function getPosts() {


    $pdo = new PDO('sqlite:hacker.sqlite');

       
    $statement = $pdo->prepare('SELECT * from Post');
    $statement->execute();
    die(var_dump($statement));
}