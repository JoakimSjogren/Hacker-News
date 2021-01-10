<?php
require __DIR__ . "/../app/function.php";
require __DIR__ . "/header.php";

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
