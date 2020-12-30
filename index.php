<?php
    require __DIR__ . "/views/header.php";
    require __DIR__ . "/views/navigation.php";


    if (isset($_SESSION['user'])) {
        $userName = $user['Name'];

        Echo "WELCOME!"; 
    }
?>
    <p>
        <?php
        if (isset($_SESSION['user'])) {
            ?>
                <p>hello  <?php echo $_SESSION['user']['name']?>!!!!!</p>
            <?php
        }
        else {
            ?>
                <p>hello!</p>
            <?php
        }
        ?>
    </p>
    
</body>
</html>