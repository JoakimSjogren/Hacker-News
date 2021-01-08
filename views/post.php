<?php
session_start();
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
require __DIR__ . "/../app/function.php";
if (isset($_GET['id'])) {

    $postInfo = getPostById(($_GET['id']));




?>
    <a href="<?= $postInfo['link'] ?>">
        <h2><?= $postInfo['title'] ?></h2>
        <h5><?= $postInfo['link'] ?></h5>
    </a>
    <?php
    //Remove post
    if ($_SESSION['user']['id'] === $postInfo['user_id']) {
    ?>
        <a href="">Remove Post</a>
    <?php
    }
    ?>
    <p>
        <?=
            $postInfo['description'];
        ?>
    </p>


<?php
}
