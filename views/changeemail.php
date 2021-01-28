<?php
require __DIR__ . "/../app/function.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/styles/error.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
</head>

<body>


    <?php

    if (isset($_SESSION['user'])) {
        ?>
        <form action="/app/user/changeemail.php" method="post">
            <div class="form-group">
                <label for="newemail">New Email</label>
                <input type="text" name="newemail" id="newemail" required>
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Set new email</button>
        </form>
        <?php
    }
    ?>