<?php
session_start();
?>

<nav>
    <div class="logo-nav-container">
        <a href="/index.php">
            <h5>Hacker News</h5>
        </a>
    </div>
    <ul>
        <li>new</li>
        <li>past</li>
        <li>comments</li>
        <li>ask</li>
        <li>show</li>
        <li>jobs</li>
        <li><a href="/views/submit.php">submit</a></li>
        <li>
            <?php


            ?>
        </li>
    </ul>
    <div class="login-nav-container">
        <?php
        if (isset($_SESSION['user'])) {

            if (isset($_SESSION['user']['name'])) {
        ?>
                <a href="/views/profile.php"><?php echo $_SESSION['user']['name'] ?></a>
            <?php
            } else {
            ?>
                <a href="/views/profile.php">Account</a>
            <?php
            }
        }
        if (isset($_SESSION['user'])) {
            ?>
            <a href="/app/user/logout.php" class="login-btn">Logout</a>
        <?php
        } else {
        ?>
            <a href="./login.php" class="login-btn">Login</a>
        <?php
        }

        ?>
    </div>
</nav>