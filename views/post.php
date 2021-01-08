<?php
require __DIR__ . "/header.php";
require __DIR__ . "/navigation.php";
if (isset($_GET['id'])) {
    echo $_GET['id'];
}
