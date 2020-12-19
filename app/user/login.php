<?php
    require __DIR__ . ('../function.php');

    if (isset($_POST['email'], $_POST['password'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $pdo = new PDO('sqlite:hacker.db');
        // $statement = $pdo->prepare('SELECT *');
        
    }
?>