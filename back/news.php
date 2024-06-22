<?php
$total = $News->count();
$div = 3;
$pages = ceil($total / $div);
$now = ($_GET['p']) ?? 1;
$start = ($now - 1) * $div;
$news = $News->all("limit $start,$div");
?>
<style>
    table {
        width: 90%;
        margin: auto;
        text-align: center;
    }

    td:nth-child(1),
    td:nth-child(3),
    td:nth-child(4) {
        width: 10%;
    }
</style>
<form action="./api/edit_news.php" method="post">
    <table>
        <tr>
            <th>編號</th>
            <th>標題</th>
            <th>顯示</th>
            <th>刪除</th>
        </tr>
        <?php
        foreach ($news as $key => $n) {
        ?>
            <tr>
                <td class="clo"><?= $key + $start + 1 ?>.</td>
                <td><?= $n['title'] ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $n['id'] ?>" <?= ($n['sh'] == 1) ? "checked" : "" ?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $n['id'] ?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?= $n['id'] ?>">
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php
        if (($now - 1) > 0) {
            $pre = $now - 1;
            echo "<a href='?do=news&p=$pre'><</a>";
        }
        $style = "style='font-size:20px;'";
        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <a href="?do=news&p=<?= $i ?>" <?= ($now == $i) ? $style : "" ?>><?= $i ?></a>
        <?php
        }
        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'>></a>";
        }
        ?>
    </div>
    <div class="ct"><input type="submit" value="確定修改"></div>
</form>