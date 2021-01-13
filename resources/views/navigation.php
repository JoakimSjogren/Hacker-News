<?php
require __DIR__ . "/../app/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>
    <nav>
        <div class="logo-nav-container">
            <a href="/index.php">
                <h5 class="logo">Hacker News</h5>
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
                <a href="/views/login.php" class="login-btn">Login</a>
            <?php
            }

            ?>
        </div>
    </nav>

    <div class="hamburger">
        <div class="hamburger-row"></div>
        <div class="hamburger-row"></div>
        <div class="hamburger-row"></div>
    </div>

    <div class="hamburger-nav">
        <div class="logo-hamburger-nav-container">
            <a href="/index.php">
                <h5 class="hamburger-logo">Hacker News</h5>
            </a>
        </div>
        <ul>
            <li><a href="/index.php">New</a></li>
            <li><a href="..//../views/mostupvotes.php">Most upvotes</a></li>
            <li><a href="/views/submit.php">Submit</a></li>

            <?php
            if (isset($_SESSION['user'])) {

                if (isset($_SESSION['user']['email'])) {
            ?>
                    <li> <a href="/views/profile.php" class="hamburger-account-btn"><?php echo $_SESSION['user']['email'] ?></a> </li>
                <?php
                } else {
                ?>
                    <li> <a href="/views/profile.php" class="hamburger-account-btn">Account</a> </li>
                <?php
                }
                ?>
                <li> <a href="/app/user/logout.php" class="hamburger-login-btn">Logout</a> </li>
            <?php
            } else {
            ?>
                <li> <a href="/views/login.php" class="hamburger-login-btn">Login</a> </li>
            <?php
            }

            ?>
        </ul>
    </div>
    <script src="..//assets/scripts/main.js"></script>
</body>

</html>