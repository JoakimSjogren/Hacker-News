<?php
require __DIR__ . "/../app/function.php";
require __DIR__ . "/header.php";


if (isset($_GET['id'])) {
    $commentId = $_GET['id'];

    $commentInfo = getCommentById($commentId);

    $commentAuthorId = $commentInfo['user_id'];





    if ($commentAuthorId === $_SESSION['user']['id']) {



        $content = $commentInfo['content'];


        $linkToEditComment = '../app/user/editcomment.php?id=' . $commentId;
        $linkToDeleteComment = '../app/user/deletecomment.php?id=' . $commentId;
?>
        <form action="<?= $linkToDeleteComment ?>" method="post">
            <span>Delete comment</span>
            <button type="submit">Delete Comment</button>
        </form>
        <!-- Submit form -->
        <form action="<?= $linkToEditComment ?>" method="post">
            <span>Update your comment</span>
            <div class="form-group">
                <label for="content">Comment</label>
                <input value="<?= $content ?>" type="content" name="content" id="content" required>
            </div>
            <button type="submit">Update Comment</button>
        </form>


<?php

    } else {
        header("Location: /index.php");
    }
}
