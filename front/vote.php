<?php
$subject = $Que->find($_GET['id'])['text'];
$opts = $Que->all(['subject_id' => $_GET['id']]);
?>
<form action="./api/vote.php" method="post">
    <fieldset>
        <legend>目前位置:首頁>問卷調查><?= $subject ?></legend>
        <div><b><?= $subject ?></b></div>
        <?php
        foreach ($opts as $opt) {
        ?>
        <div style="margin:10px 0;">
            <input type="radio" name="opt" value="<?= $opt['id'] ?>">
            <span><?= $opt['text'] ?></span>
        </div>

        <?php
        }
        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </fieldset>