<?php
    session_start();
    if (isset($_FILES['avatar'])) {
        $avatar = $_FILES['avatar'];
        if ($avatar['type'] === 'image/png' && isset($_SESSION['user'])) {

        $userId = $_SESSION['user']['id'];
        move_uploaded_file($avatar['tmp_name'],
         '..//../app/database/profileimages' . "/$userId.png");
         header("Location: /views/profile.php");
        }
    }
?>