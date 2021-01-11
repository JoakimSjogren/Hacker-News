<?php
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
require __DIR__ . "/../app/function.php";
session_start();

$biography = $_SESSION['user']['biography'];

?>

<div class = "profile-container">

<form action="/app/user/updatebiography.php" method="post">
     <span>biography</span>
     <div class="form-group">
          <input value="<?php echo $biography ?>" type="text" name="biography" id="biography" required>
     </div>
     <button type="submit">Save</button>
</form>

<!-- <img src="..//../app/database/profileimages/8.png" alt=""> -->
<?php
$src = findImageById($_SESSION['user']['id']);

echo '<img class = "profile-picture" src="' . $src . '">';
?>

<form action="/app/user/uploadimage.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Upload Image</label>
            <input type="file" name="avatar" id="avatar" accept=".png" required>
        </div>

        <button type="submit">Upload</button>
    </form>

<a href="./changepassword.php">Change Password</a>
<a href="./changeemail.php">Change Email</a>


</div>