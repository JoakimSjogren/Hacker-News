<?php
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
require __DIR__ . "/../app/function.php";

$biography = $_SESSION['user']['biography'];

?>

<div class="profile-container">

    <div class="left-div-profile ">
        <h2 class="profile-email"><?= $_SESSION['user']['email'] ?></h2>
        <?php


        $src = findImageById($_SESSION['user']['id']);

        echo '<img class = "profile-picture" src="' . $src . '">';
        ?>

        <form action="/app/user/uploadimage.php" method="post" enctype="multipart/form-data" class="avatar-form">
            <div>
                <label for="avatar">Upload Image</label>
                <input type="file" name="avatar" id="avatar" accept=".png" required>
            </div>
            <button type="submit">Upload</button>
        </form>
        <form action="/app/user/updatebiography.php" method="post" class="biography-form">
            <span>Biography</span>
            <div class="form-group">
                <input class="biography" value="<?php echo $biography ?>" type="text" name="biography" id="biography" required>
            </div>
            <button type="submit">Save</button>
        </form>

    </div>
    <div class="right-div-profile">
        <a href="./changepassword.php">Change Password</a>
        <a href="./changeemail.php">Change Email</a>
    </div>


</div>