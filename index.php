<?php
// session_start();

require __DIR__ . "/views/header.php";
require __DIR__ . "/views/navigation.php";
require __DIR__ . "/app/function.php";

//
?>


<main>
  <!-- Posts -->
  <div class=posts-container>

    <?php

    $posts = getPostsByNewest();

    $postCount = count($posts);
    for ($i = 0; $i < $postCount; $i++) {
      $linkToPost =  '/views/post.php?id=' . $posts[$i]['id'];
    ?>
      <div class='post'>

        <a href=<?php echo $linkToPost ?>>
          <div class="left-div-post">
            <?= $posts[$i]['title']; ?> <br>
            <?= $posts[$i]['description']; ?>
          </div>
        </a>
        <p>

        <div class="right-div-post">
          <span> <?= "Upvotes:" . $posts[$i]['uppvotes']; ?> </span> <br>
          <span> <?= $posts[$i]['created_at']; ?> </span>
        </div>


        </p>
      </div>

    <?php
    }
    ?>
  </div>

</main>

</body>

</html>