<?php
   session_start();

   if (isset($_SESSION['user'])) {
        ?>
        <form action="/app/user/changepassword.php" method = "post">
    <div class = "form-group">
        <label for="oldpassword">Old password</label>
        <input type="password" name = "oldpassword" id = "oldpassword" required>
    </div>

     
    <div class = "form-group">
        <label for="newpassword">New password</label>
        <input type="password" name = "newpassword" id = "newpassword" required>
    </div>
    <button type = "submit">Reset password</button>
    </form>
    <?php
    }
?>