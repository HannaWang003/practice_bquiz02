<?php
$total = $News->count(['sh' => 1]);
$div = 5;
$pages = ceil($total / $div);
$now = ($_GET['p']) ?? 1;
$start = ($now - 1) * $div;
$news = $News->all(['sh' => 1], "limit $start,$div");
?>
<fieldset>
    <legend>目前位置:首頁 > 最新文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th style="width:30%">標題</th>
            <th>內容</th>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
            <th>讚/收回讚</th>
            <?php
            }
            ?>

        </tr>
        <?php
        foreach ($news as $n) {
        ?>
        <tr>
            <td class="clo title" data-id="<?= $n['id'] ?>"><?= $n['title'] ?></td>
            <td id="s<?= $n['id'] ?>"><?= mb_substr($n['news'], 0, 20) ?>...</td>
            <td id="a<?= $n['id'] ?>" style="display:none;" class="news"><?= $n['news'] ?></td>
            <?php
                if (isset($_SESSION['user'])) {
                    echo "<th>";
                    echo "</th>";
                }
                ?>
        </tr>
        <?php
        }
        ?>
    </table>
    <div>
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
</fieldset>
<script>
$('.title').on('click', function() {
    let id = $(this).data('id');
    $(`#s${id},#a${id}`).toggle();
})
</script>