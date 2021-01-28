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
        $commentId = $_GET['id'];

        $commentInfo = getCommentById($commentId);

        $commentAuthorId = $commentInfo['user_id'];

        $postId = $_GET['post-id'];





        if ($commentAuthorId === $_SESSION['user']['id']) {



            $content = $commentInfo['content'];


            $linkToEditComment = '../app/user/editcomment.php?id=' . $commentId . '&post-id=' . $postId;
            $linkToDeleteComment = '../app/user/deletecomment.php?id=' . $commentId . '&post-id=' . $postId;
    ?>
            <form action="<?= $linkToDeleteComment ?>" method="post">
                <button class="delete-comment-btn" type="submit">Delete Comment</button>
                <input value="<?= $postId ?>" type="hidden" name="post-id" id="post-id" required>
            </form>
            <!-- Submit form -->
            <form action="<?= $linkToEditComment ?>" method="post">
                <span>Update your comment</span>
                <div class="form-group">
                    <label for="content">Comment</label>
                    <input value="<?= $content ?>" type="content" name="content" id="content" required>
                    <input value="<?= $postId ?>" type="hidden" name="post-id" id="post-id" required>

                </div>
                <button type="submit">Update Comment</button>
            </form>


    <?php

        } else {
            header("Location: /index.php");
        }
    }
