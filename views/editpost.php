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

    if (isset($_GET['id'])) {
        $postId = $_GET['id'];

        $postInfo = getPostById($postId);
        $postAuthorId = $postInfo['user_id'];



        if ($postAuthorId === $_SESSION['user']['id']) {
            $title = $postInfo['title'];
            $description = $postInfo['description'];
            $link = $postInfo['link'];

            $linkToEditPost = '../app/user/editpost.php?id=' . $postId;
            ?>
            <!-- Submit form -->
            <form action="<?= $linkToEditPost ?>" method="post">
                <span>Submit a post</span>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="<?= $title ?>" type="text" name="title" id="title" required>
                </div>

                <div class="form-group">
                    <label for="url">Url</label>
                    <input value="<?= $link ?>" type="url" name="url" id="url" required>
                </div>

                <div class="form-group">
                    <label for="description">Text</label>
                    <input value="<?= $description ?>" type="text" name="description" id="description" required>
                </div>
                <button type="submit">Update Post</button>
            </form>


            <?php
        } else {
            header("Location: /index.php");
        }
    }
