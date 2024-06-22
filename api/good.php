<?php
include_once "db.php";
$Log->save(['acc' => $_SESSION['user'], 'news' => $_POST['id']]);
