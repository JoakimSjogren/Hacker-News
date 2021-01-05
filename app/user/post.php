<?php

if (isset($_POST['title'], $_POST['url'], $_POST['description'])) {
    
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];


    $pdo = new PDO('sqlite:../database/hacker.sqlite');
    
    $statement = $pdo->prepare('INSERT INTO Posts(user_id, description, created_at, title, link, id)
    VALUES(2, :description, "12/12/2020", :title, :url, 2)');

    $statement->bindparam(':title', $title, PDO::PARAM_STR);
    $statement->bindparam(':url', $url, PDO::PARAM_STR);
    $statement->bindparam(':description', $description, PDO::PARAM_STR);

    $statement->execute();
    
    header("Location: /index.php");
}
?>