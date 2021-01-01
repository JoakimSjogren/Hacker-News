<?php
    session_start();
?>

<nav>
    <div class = "logo-nav-container">
        <h5>Hacker News</h5>
    </div>
    <ul>
        <li>new</li>
        <li>past</li>
        <li>comments</li>
        <li>ask</li>
        <li>show</li>
        <li>jobs</li>
        <li>submit</li>
    </ul>
    <div class = "login-nav-container">
    <?php
        if (isset($_SESSION['user'])) {
            ?>
            <a href = "./app/user/logout.php" class = "login-btn">Logout</a>
            <?php
        }

        else {
            ?>
            <a href = "./login.php" class = "login-btn">Login</a>
            <?php
        }

    ?>
    </div>
</nav>