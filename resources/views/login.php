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
            <label for="login-email">Email</label>
            <input type="email" name="login-email" id="login-email" placeholder="example@email.com" required>
        </div>

        <div class="form-group">
            <label for="login-password">Password</label>
            <input type="password" name="login-password" id="login-password" placeholder="********" required>
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
                <label for="register-email">Email</label>
                <input type="email" name="register-email" id="register-email" placeholder="example@email.com" required>
            </div>

            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" name="register-password" id="register-password" placeholder="********" required>
            </div>
            <button type="submit">Register</button>
        </form>

</body>

</html>