<?php
require __DIR__ . "/app/autoload.php";
require __DIR__ . "/views/header.php";
require __DIR__ . "/views/navigation.php";






// As a user I'm able to view new posts.

// The application should be responsive and be built using the method mobile-first.

// The project should contain the files and directories in the resources folder in the root of your repository.

// The project should not include any coding errors, warning or notices.

// The project must be tested on at least two of your classmates computers. Add the testers name to the README.md file.

// The repository must contain a README.md file with installation instructions and documentation.

// The repository must contain a LICENSE file.

// The repository must contain a .editorconfig file with your preferred settings.

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