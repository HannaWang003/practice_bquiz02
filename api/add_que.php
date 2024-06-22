<?php
include_once "db.php";
$Que->save(['text' => $_POST['subject'], 'subject_id' => 0]);
$subjectID = $Que->max('id');
foreach ($_POST['option'] as $opt) {
    $Que->save(['text' => $opt, 'subject_id' => $subjectID]);
}
to("../back.php?do=que");
