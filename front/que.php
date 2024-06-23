<fieldset>
    <legend>目前位置:首頁 > 問卷調查</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th style="width:2%">編號</th>
            <th>問卷調查</th>
            <th style="width:5%;">投票總數</th>
            <th style="width:2%">結果</th>
            <th style="width:5%">狀態</th>
        </tr>
        <?php
        $ques = $Que->all(['subject_id' => 0]);
        foreach ($ques as $key => $que) {
        ?>
        <tr>
            <td style="text-align:center"><?= $key + 1 ?></td>
            <td><?= $que['text'] ?></td>
            <td style="text-align:center"><?= $que['vote'] ?></td>
            <td style="text-align:center"><a href="?do=res&id=<?= $que['id'] ?>">結果</a></td>
            <td style="text-align:center">
                <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                <a href="?do=vote&id=<?= $que['id'] ?>">參與投票</a>
                <?php
                    }else{
                        ?>
                <a href="?do=login">請先登入</a>
                <?php
                    }
                    ?>
            </td>
        </tr>
        <?php
        }

        ?>
    </table>
</fieldset>