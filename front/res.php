<?php
$subject = $Que->find($_GET['id']);
$opts = $Que->all(['subject_id' => $_GET['id']]);
?>
<fieldset>
    <legend>目前位置:首頁>問卷調查><?= $subject['text'] ?></legend>
    <div><b><?= $subject['text'] ?></b></div>
    <?php
    foreach ($opts as $opt) {
        $rate = round($opt['vote'] / $subject['vote'], 2);
    ?>
        <div style="margin:10px 0;">
            <span style="display:inline-block;width:25%"><?= $opt['text'] ?></span>
            <span style="display:inline-block;height:30px;background:#ccc;width:<?= 500 * $rate ?>px;"></span>
            <span><?= $opt['vote'] ?>票(<?= $rate * 100 ?>%)</span>
        </div>

    <?php
    }
    ?>
    <div class="ct"><button onclick="history.go(-1)">返回</button></div>
</fieldset>