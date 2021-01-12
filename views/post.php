<?php
session_start();
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
require __DIR__ . "/../app/function.php";
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $postInfo = getPostById($postId);
    $postAuthorId = $postInfo['user_id'];
?>

    <h2><?= $postInfo['title'] ?></h2>
    <a href="<?= $postInfo['link'] ?>">
        <h5><?= $postInfo['link'] ?></h5>
    </a>

    <?php
    $src = findImageById($postAuthorId);

    echo '<img class = "profile-picture" src="' . $src . '">';

    //Remove post
    if ($_SESSION['user']['id'] === $postInfo['user_id']) {
        $linkToRemovePost = '/app/user/removepost.php?id=' . $postId;
        $linkToEditPost = '/views/editpost.php?id=' . $postId;
    ?>
        <a href="<?= $linkToRemovePost ?>">Remove Post</a>
        <a href="<?= $linkToEditPost ?>">Edit Post</a>
    <?php
    }

    $linkToUppvote = '/app/user/uppvote.php?id=' . $postId;
    $totalUppvotes = getUppvoteAmountById($postId);
    $hasUpvotedPost = checkIfPostIsUpvoted($postId);

    if (!$hasUpvotedPost) {
    ?>
        <form action="<?= $linkToUppvote ?>" method="post">
            <button class="like-button" type="submit"><?= $totalUppvotes['uppvotes'] ?></button>
        </form>
    <?php
    } else {
    ?>
        <form action="<?= $linkToUppvote ?>" method="post">
            <button class="like-button upvoted" type="submit"><?= $totalUppvotes['uppvotes'] ?></button>
        </form>
    <?php
    }
    ?>

    <div class="description-container">
        <p>
            <?=
                $postInfo['description'];

            ?>
        </p>
    </div>
    <div class="post-comment-container">
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
    </div>
    <!-- Comments -->

    <?php
    $comments = getCommentsByPostId($postId);
    foreach ($comments as $comment) {
    ?>
        <div class="comment-container">
            <p>
                <?= $comment['content']; ?>
            </p>
            <?php
            if ($_SESSION['user']['id'] === $comment['user_id']) {

                $commentId = $comment['id'];

                $linkToEditComment = '/views/editcomment.php?id=' . $commentId;
            ?>
                <a href="<?= $linkToEditComment ?>">Edit Comment</a>
            <?php
            }
            ?>
        </div>
<?php
    }
}
