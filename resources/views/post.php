<?php
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
require __DIR__ . "/../app/function.php";
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $postInfo = getPostById($postId);
    $postAuthorId = $postInfo['user_id'];
    $postAuthorEmail = getUserById($postAuthorId)['email'];
    $userId = $_SESSION['user']['id'];
?>
    <div class="post-main-div">
        <div class="post-author-div">
            <?php
            $src = findImageById($postAuthorId);
            echo '<img class="post-author-picture " src="' . $src . '">';
            ?>
            <h3 class="author-post"><?= $postAuthorEmail ?></h3>
        </div>
        <div class="post-info">
            <h2><?= $postInfo['title'] ?></h2>
            <a href="<?= $postInfo['link'] ?>">
                <h5 class="post-link"><?= $postInfo['link'] ?></h5>
            </a>
            <div class="description-container">
                <p>
                    <?=
                    $postInfo['description'];

                    ?>
                </p>
            </div>
        </div>



        <div class="post-author-info">
            <?php
            //Remove post
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['id'] === $postInfo['user_id']) {
                    $linkToRemovePost = '/app/user/removepost.php?id=' . $postId;
                    $linkToEditPost = '/views/editpost.php?id=' . $postId;
            ?>
                    <a href="<?= $linkToRemovePost ?>">Remove Post</a>
                    <a href="<?= $linkToEditPost ?>">Edit Post</a>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="upvote-container">
        <?php
        $linkToUppvote = '/app/user/uppvote.php?id=' . $postId;
        $totalUppvotes = getUppvoteAmountById($postId);
        $hasUpvotedPost = checkIfPostIsUpvoted($postId);

        if (!$hasUpvotedPost) {
        ?>
            <form action="<?= $linkToUppvote ?>" method="post">
                <span class="upvotes-text">Upvotes:</span>
                <button class="like-button" type="submit"><?= $totalUppvotes['uppvotes'] ?></button>
            </form>
        <?php
        } else {
        ?>
            <form action="<?= $linkToUppvote ?>" method="post">
                <span class="upvotes-text">Upvotes:</span>
                <button class="like-button upvoted" type="submit"><?= $totalUppvotes['uppvotes'] ?></button>
            </form>
        <?php
        }
        ?>
    </div>


    <div class="post-comment-container">
        <?php
        $linkToComment = '/app/user/postcomment.php?id=' . $postId . '&post-id=' . $postId;
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

    <div class="comment-section">
        <?php
        //Lvl 1 responses
        $comments = getCommentsByPostId($postId);
        foreach ($comments as $comment) {
            $commentId = $comment['id'];
            $linkToReplyToComment = '/views/replyTocomment.php?id=' . $commentId . '&post-id=' . $postId;
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
                <div class="right">
                    <div class="comment-link-container">
                        <a class="link-to-reply-to-comment" href="<?= $linkToReplyToComment ?>">Reply to comment</a>
                        <?php
                        if (isset($_SESSION['user'])) {
                            if ($_SESSION['user']['id'] === $comment['user_id']) { // If logged in and your comment
                                $linkToEditComment = '/views/editcomment.php?id=' . $commentId . '&post-id=' . $postId;
                        ?>
                                <a class="link-to-edit-comment" href="<?= $linkToEditComment ?>">Edit Comment</a>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            // Lvl 2 responses
            $commentComments = getCommentsByParentId($commentId);

            foreach ($commentComments as $commentComment) {
                $commentCommentId = $commentComment['id'];
                $linkToReplyToComment = '/views/replyTocomment.php?id=' . $commentCommentId . '&post-id=' . $postId;
                $linkToSendCommentLike = '/app/user/sendCommentLike.php?id=' . $commentCommentId . '&post-id=' . $postId;

                hasLikedComment($commentCommentId, $userId, 'sqlite:../app/database/hacker.sqlite') ? $likeText = 'Unlike' : $likeText = 'Like';
            ?>
                <div class="comment-container lvl2">
                    <div class="left">
                        <div class="comment-author">
                            <?php
                            $commentAuthorId = $commentComment['user_id'];
                            $commentAuthorEmail = getUserById($commentAuthorId)['email'];
                            $src = findImageById($commentAuthorId);
                            echo '<img class="comment-author-picture" src="' . $src . '">';
                            ?>
                            <h3 class="comment-author-email"><?= $commentAuthorEmail ?></h3>
                        </div>
                        <p class="comment">
                            <?= $commentComment['content']; ?>
                        </p>
                    </div>
                    <div class="right">
                        <div class="comment-link-container">
                            <a class="link-to-reply-to-comment" href="<?= $linkToReplyToComment ?>">Reply to comment</a>
                            <a class="link-to-reply-to-comment" href="<?= $linkToSendCommentLike ?>"><?= $likeText ?></a>
                            <?php
                            if (isset($_SESSION['user'])) {
                                if ($_SESSION['user']['id'] === $commentComment['user_id']) { // If logged in and your comment
                                    $linkToEditComment = '/views/editcomment.php?id=' . $commentCommentId . '&post-id=' . $postId;
                            ?>
                                    <a class="link-to-edit-comment" href="<?= $linkToEditComment ?>">Edit Comment</a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                // Lvl 3 responses
                $commentCommentComments = getCommentsByParentId($commentCommentId);

                foreach ($commentCommentComments as $commentCommentComment) {
                    $commentCommentCommentId = $commentCommentComment['id'];
                    $linkToReplyToComment = '/views/replyTocomment.php?id=' . $commentCommentCommentId . '&post-id=' . $postId;
                ?>
                    <div class="comment-container lvl3">
                        <div class="left">
                            <div class="comment-author">
                                <?php
                                $commentAuthorId = $commentCommentComment['user_id'];
                                $commentAuthorEmail = getUserById($commentAuthorId)['email'];
                                $src = findImageById($commentAuthorId);
                                echo '<img class="comment-author-picture" src="' . $src . '">';
                                ?>
                                <h3 class="comment-author-email"><?= $commentAuthorEmail ?></h3>
                            </div>
                            <p class="comment">
                                <?= $commentCommentComment['content']; ?>
                            </p>
                        </div>
                        <div class="right">
                            <div class="comment-link-container">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    if ($_SESSION['user']['id'] === $commentCommentComment['user_id']) { // If logged in and your comment
                                        $linkToEditComment = '/views/editcomment.php?id=' . $commentCommentCommentId . '&post-id=' . $postId;
                                ?>
                                        <a class="link-to-edit-comment" href="<?= $linkToEditComment ?>">Edit Comment</a>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                    // Lvl 3 responses
                }
            }

            ?>
    </div>
<?php
        }
    }
