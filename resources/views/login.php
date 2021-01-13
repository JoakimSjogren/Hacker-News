<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/styles/error.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <link rel="stylesheet" href="/assets/styles/media.css">
</head>

<body>

    <!-- Login -->
    <form action="/app/user/login.php" method="post" class="login-form">
        <span>Login</span>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="example@email.com" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="********" required>
        </div>
        <button type="submit">Login</button>
    </form>

    <form action="/app/user/register.php" method="post" class="register-form">

        <!-- register -->
        <?php
        if (isset($_SESSION['error'])) {
        ?>
            <p class="error"> <?php echo ($_SESSION['error']);   ?> </p>
            <?php
            unset($_SESSION['error']);

            ?>
        <?php
        }

        ?>
        <form action="app/user/register.php" method="post">
            <span>Create Account</span>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="example@email.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="********" required>
            </div>
            <button type="submit">Register</button>
        </form>

</body>

</html>