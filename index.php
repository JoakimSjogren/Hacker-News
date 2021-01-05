<?php
    require __DIR__ . "/app/autoload.php";
    require __DIR__ . "/views/header.php";
    require __DIR__ . "/views/navigation.php";

    

   
?>
    <p>
        <?php
        
        if (isset($_SESSION['user'])) {
            $userName = $_SESSION['user']['name'];
            ?>
                <p>
                <?="Hello $userName!"?>
                </p>
            <?php
        }
        ?>
    </p>

    <main>

        <div class = posts-container>
            <!-- Posts -->
            <?php
            $posts = getPosts();
            
          for ($i=0; $i < 12; $i++) { 
            ?>
            <div class = 'post'>
                <p>
                  <?= $posts[$i]['title']; ?>
                </p>
                <p>
                  <?= $posts[$i]['description']; ?>
                </p>
                <p>
                  <?= $posts[$i]['link']; ?>
                </p>
            </div>
            <?php
            }
            ?>
        </div>

    </main>
    
</body>
</html>