<?php
$subject = $Que->find($_GET['id'])['text'];
?>
<fieldset>
    <legend>目前位置:首頁>問卷調查><?= $subject ?></legend>
</fieldset>