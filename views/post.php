<?php
session_start();
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
require __DIR__ . "/../app/function.php";
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $postInfo = getPostById($postId);

?>
    <a href="<?= $postInfo['link'] ?>">
        <h2><?= $postInfo['title'] ?></h2>
        <h5><?= $postInfo['link'] ?></h5>
    </a>
    <?php
    //Remove post
    if ($_SESSION['user']['id'] === $postInfo['user_id']) {
    ?>
        <a href="">Remove Post</a>
    <?php
    }
    ?>
    <p>
        <?=
            $postInfo['description'];
        ?>
    </p>

    <form action="/app/user/postcomment.php" method="post">
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
        <p>

            <?= $comment['content']; ?>
        </p>
<?php
    }
}
