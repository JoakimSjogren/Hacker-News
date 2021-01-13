<?php
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

<?php

if (!isset($_SESSION['user'])) {
    header("Location: /views/login.php");
}

?>

<body>
    <!-- Submit form post -->
    <form action="/app/user/post.php" method="post" class="post-submit-form">
        <span>Submit a post</span>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div class="form-group">
            <label for="url">Url</label>
            <input type="url" name="url" id="url" required>
        </div>

        <div class="form-group">
            <label for="description">Text</label>
            <input type="text" name="description" id="description" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>