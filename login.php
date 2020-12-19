<?php

?>
<!-- Login -->
<form action="app/user/login.php" method = "post">
<span>Login</span>
<div class = "form-group">
    <label for="email">Email</label>
    <input type="text" name = "email" id = "email" placeholder = "example@email.com" required>
</div>

<div class = "form-group">
    <label for="password">Password</label>
    <input type="password" name = "password" id = "password" placeholder = "********" required>
</div>
    <button type = "submit">Login</button>
</form>

<form action="app/user/register.php" method = "post">

<!-- register -->
<form action="app/user/register.php" method = "post">
<span>Create Account</span>
<div class = "form-group">
    <label for="email">Email</label>
    <input type="text" name = "email" id = "email" placeholder = "example@email.com" required>
</div>

<div class = "form-group">
    <label for="password">Password</label>
    <input type="password" name = "password" id = "password" placeholder = "********" required>
</div>
    <button type = "submit">Register</button>
</form>