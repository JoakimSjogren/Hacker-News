<?php
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
session_start();

$biography = $_SESSION['user']['biography'];

?>


<form action="/app/user/updatebiography.php" method="post">
     <span>biography</span>
     <div class="form-group">
          <input value="<?php echo $biography ?>" type="text" name="biography" id="biography" required>
     </div>
     <button type="submit">Save</button>
</form>



<a href="./changepassword.php">Change Password</a>
<a href="./changeemail.php">Change Email</a>