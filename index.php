<?php
    require __DIR__ . "/views/header.php";
    require __DIR__ . "/views/navigation.php";
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
        else {
            ?>
                <p>Hello!</p>
            <?php
        }
        ?>
    </p>
    
</body>
</html>