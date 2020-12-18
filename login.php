<?php

?>
<form action="app/user/login.php" method = "post">

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