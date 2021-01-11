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
        <li><a href="/index.php">New</a></li>
        <li><a href="..//../views/mostupvotes.php">Most upvotes</a></li>
        <li><a href="/views/submit.php">Submit</a></li>
        <li>
            <?php

            ?>
        </li>
    </ul>
    <div class="login-nav-container">
        <?php
        if (isset($_SESSION['user'])) {

            if (isset($_SESSION['user']['email'])) {
        ?>
                <a href="/views/profile.php" class="account-btn"><?php echo $_SESSION['user']['email'] ?></a>
            <?php
            } else {
            ?>
                <a href="/views/profile.php" class="account-btn">Account</a>
            <?php
            }
            ?>
            <a href="/app/user/logout.php" class="login-btn">Logout</a>
        <?php
        } else {
        ?>
            <a href="../login.php" class="login-btn">Login</a>
        <?php
        }

        ?>
    </div>
</nav>