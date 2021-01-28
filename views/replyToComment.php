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
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>

<body>


    <?php
    if (isset($_SESSION['user'])) {
        if (isset($_GET['id'])) {
            $commentId = $_GET['id'];
            $postId = $_GET['post-id'];

            $userId = $_SESSION['user']['id'];

            $commentInfo = getCommentById($commentId);

            $commentAuthorId = $commentInfo['user_id'];


            $content = $commentInfo['content'];


            $linkToReplyToComment = '../app/user/replyToComment.php?id=' . $commentId;


            // Comment
            $comment = getCommentById($commentId);
            ?>

            <div class="comment-container">
                <div class="left">
                    <div class="comment-author">
                        <?php
                        $commentAuthorId = $comment['user_id'];
                        $commentAuthorEmail = getUserById($commentAuthorId)['email'];
                        $src = findImageById($commentAuthorId);
                        echo '<img class="comment-author-picture" src="' . $src . '">';
                        ?>
                        <h3 class="comment-author-email"><?= $commentAuthorEmail ?></h3>
                    </div>
                    <p class="comment">
                        <?= $comment['content']; ?>
                    </p>
                </div>
            </div>


            <!-- Submit form -->
            <form action="<?= $linkToReplyToComment ?>" method="post">
                <span>Reply to comment</span>
                <div class="form-group">
                    <label for="content">Reply</label>
                    <input type="content" name="content" id="content" required>
                    <input type="hidden" name="id" value="<?= $commentId ?>">
                    <input type="hidden" name="user-id" value="<?= $userId ?>">
                    <input type="hidden" name="post-id" value="<?= $postId ?>">
                </div>
                <button type="submit">Send reply</button>
            </form>
            <?php
        }
    } else {
        header("Location: /views/login.php");
    } ?>