<?php

if (isset($_POST['title'], $_POST['url'], $_POST['description'])) {
    
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];


    $pdo = new PDO('sqlite:../database/hacker.sqlite');
    
}
?>