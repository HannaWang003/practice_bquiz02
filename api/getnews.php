<?php
include_once "db.php";
$row = $News->find($_POST['id']);
?>
<b><?= $row['title'] ?></b>
<pre><?= $row['news'] ?></pre>