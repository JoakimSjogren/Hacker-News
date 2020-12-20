<?php
    // require __DIR__ . ('./function.php');
    
    if (isset($_POST['email'], $_POST['password'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $pdo = new PDO('sqlite:hacker.sqlite');

        $statement = $pdo->prepare('SELECT * from Users WHERE email = :email');
        $statement->bindparam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
       
        die(var_dump($user));
    }
?>