<?php
require __DIR__ . "/app/autoload.php";
require __DIR__ . "/views/header.php";
require __DIR__ . "/views/navigation.php";




// As a user I should be able to upload a profile avatar image.
// As a user I should be able to edit my posts.
// As a user I should be able to delete my posts.
// As a user I'm able to view most upvoted posts.
// As a user I'm able to view new posts.
// As a user I should be able to upvote posts.
// As a user I should be able to remove upvote from posts.
// As a user I'm able to comment on a post.
// As a user I'm able to edit my comments.
// As a user I'm able to delete my comments

?>


<main>

  <div class=posts-container>
    <!-- Posts -->
    <?php

    $posts = getPosts();

    $postCount = count($posts);
    for ($i = 0; $i < $postCount; $i++) {
      $linkToPost =  '/views/post.php?id=' . $posts[$i]['id'];
    ?>

      <div class='post'>

        <a href=<?php echo $linkToPost ?>>
          <?= $posts[$i]['title']; ?>
        </a>
        <p>
          <?= $posts[$i]['description']; ?>
          <?= $posts[$i]['id']; ?>
        </p>
      </div>

    <?php
    }
    ?>
  </div>

</main>

</body>

</html>