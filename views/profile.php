<?php
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
?>

<form action="/app/user/updatebiography.php" method="post">
     <span>biography</span>
     <div class="form-group">
          <input type="text" name="title" id="title" required placeholder="<?php echo "holder" ?>">
     </div>
     <button type="submit">Save</button>
</form>

<a href="./changepassword.php">Change Password</a>
<a href="./changeemail.php">Change Email</a>