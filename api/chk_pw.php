<?php
include_once "db.php";
$res = $User->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]);
echo $res;
