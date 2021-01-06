<?php
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
?>

<form action="/app/user/updatebiography.php" method="post">
     <span>biography</span>
     <div class="form-group">
          <input type="text" name="biography" id="biography" placeholder="<?php echo "My biography" ?>" required>
     </div>
     <button type="submit">Save</button>
</form>

<form action="/app/user/changeusername.php" method="post">
     <span>Username</span>
     <div class="form-group">
          <input type="text" name="username" id="username" placeholder="username" required>
     </div>
     <button type="submit">Update Username</button>
</form>

<a href="./changepassword.php">Change Password</a>
<a href="./changeemail.php">Change Email</a>