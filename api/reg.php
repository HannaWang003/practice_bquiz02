<?php
include_once "db.php";
$res = $User->count(['acc' => $_POST['acc']]);
if ($res == 0) {
    $User->save($_POST);
} else {
    echo $res;
}
