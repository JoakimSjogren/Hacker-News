<?php
    require __DIR__ . "/views/header.php";
    require __DIR__ . "/views/navigation.php";
    require __DIR__ . "/app/function.php";
    session_start();

   
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
            foreach($posts as $post) 
            {
            ?>
            <div class = 'post'>
                <p>
                <?= $post; ?>
                </p>
            </div>
            <?php
            }
            ?>
        </div>

    </main>
    
</body>
</html>