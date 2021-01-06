<?php
require __DIR__ . "/app/autoload.php";
require __DIR__ . "/views/header.php";
require __DIR__ . "/views/navigation.php";




?>


<main>

  <div class=posts-container>
    <!-- Posts -->
    <?php

    $posts = getPosts();

    $postCount = count($posts);
    for ($i = 0; $i < $postCount; $i++) {
    ?>
      <div class='post'>
        <a href="<?= $posts[$i]['link']; ?>">
          <?= $posts[$i]['title']; ?>
        </a>
        <p>
          <?= $posts[$i]['description']; ?>
        </p>
      </div>
    <?php
    }
    ?>
  </div>

</main>

</body>

</html>