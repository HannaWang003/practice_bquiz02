<?php
include_once "db.php";
$res = $User->count(['email' => $_POST['email']]);
if ($res == 1) {
    echo $User->find(['email' => $_POST['email']])['pw'];
} else {
    echo $res;
}
