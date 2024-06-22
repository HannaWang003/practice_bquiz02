<?php
include_once "db.php";
$Log->del(['acc' => $_SESSION['user'], 'news' => $_POST['id']]);
