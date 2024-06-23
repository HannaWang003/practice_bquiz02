<?php
include_once "db.php";
$row = $Que->find($_POST['opt']);
$subject = $Que->find($row['subject_id']);
$row['vote']++;
$subject['vote']++;
$Que->save($row);
$Que->save($subject);
to("../index.php?do=res&id={$subject['id']}");
