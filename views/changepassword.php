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
        <form action="/app/user/changepassword.php" method="post">
            <div class="form-group">
                <label for="oldpassword">Old password</label>
                <input type="password" name="oldpassword" id="oldpassword" required>
            </div>


            <div class="form-group">
                <label for="newpassword">New password</label>
                <input type="password" name="newpassword" id="newpassword" required>
            </div>
            <button type="submit">Reset password</button>
        </form>
        <?php
    }
    ?>