<?php
session_start();
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
require __DIR__ . "/../app/function.php";
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $postInfo = getPostById($postId);

?>
    
            <h2><?= $postInfo['title'] ?></h2>
        <a href="<?= $postInfo['link'] ?>">
          <h5><?= $postInfo['link'] ?></h5>
        </a>
    <?php
    //Remove post
    if ($_SESSION['user']['id'] === $postInfo['user_id']) {
        $linkToRemovePost = '/app/user/removepost.php?id=' . $postId;
        $linkToEditPost = '/views/editpost.php?id=' . $postId;
    ?>
        <a href="<?= $linkToRemovePost ?>">Remove Post</a>
        <a href="<?= $linkToEditPost ?>">Edit Post</a>
    <?php
    }
    ?>
    <div class = "description-container">
    <p>
        <?=
            $postInfo['description'];

        ?>
    </p>
    </div>
    <?php
    $linkToComment = '/app/user/postcomment.php?id=' . $postId;
    ?>
    <form action="<?= $linkToComment ?>" . method="post">
        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="text" name="comment" id="comment" required>
        </div>

        <button type="submit">Post Comment</button>
    </form>

    <!-- Comments -->

    <?php
    $comments = getCommentsByPostId($postId);

    foreach ($comments as $comment) {
    ?>
    <div class = "comment-container">
        <p>

            <?= $comment['content']; ?>
        </p>
        </div>
<?php
    }
}
