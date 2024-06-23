<?php
$total = $News->count(['sh' => 1]);
$div = 5;
$pages = ceil($total / $div);
$now = ($_GET['p']) ?? 1;
$start = ($now - 1) * $div;
$news = $News->all(['sh' => 1], "order by `good` desc limit $start,$div");
?>
<style>
    .pop {
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        height: 350px;
        width: 450px;
        position: absolute;
        display: none;
        z-index: 9999;
        overflow: auto;
    }
</style>
<fieldset>
    <legend>目前位置:首頁 > 人氣文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th style="width:30%">標題</th>
            <th>內容</th>
            <th>人氣</th>
        </tr>
        <?php
        foreach ($news as $n) {
        ?>
            <tr>
                <td class="clo"><?= $n['title'] ?></td>
                <td class="title" data-id="<?= $n['id'] ?>" style="display:relative"><?= mb_substr($n['news'], 0, 20) ?>...
                    <div class="pop" id="a<?= $n['id'] ?>">
                        <b style="margin:5px;color:rgb(39,225,225);"><?= $n['title'] ?></b>
                        <pre><?= $n['news'] ?></pre>
                    </div>
                </td>
                <td>
                    <?php
                    echo $n['good'] . "個人說<img src='./img/02B03.jpg' style='width:30px;'>";
                    if (isset($_SESSION['user'])) {
                        $good = $Log->find(['acc' => $_SESSION['user'], 'news' => $n['id']]);
                        echo "<th>";
                        if ($good <= 0) {
                            echo "<a onclick='good({$n['id']})'>讚</a>";
                        } else {
                            echo "<a onclick='ungood({$n['id']})'>收回讚</a>";
                        }
                        echo "</th>";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if (($now - 1) > 0) {
            $pre = $now - 1;
            echo "<a href='?do=pop&p=$pre'><</a>";
        }
        $style = "style='font-size:20px;'";
        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <a href="?do=pop&p=<?= $i ?>" <?= ($now == $i) ? $style : "" ?>><?= $i ?></a>
        <?php
        }
        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=pop&p=$next'>></a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $('.title').hover(function() {
        $('.pop').hide();
        let id = $(this).data('id');
        $(`#a${id}`).show();
    }, function() {
        $('.pop').hide();
    })

    function good(id) {
        $.post('./api/good.php', {
            id
        }, (res) => {
            location.href = "?do=pop";
        })
    }

    function ungood(id) {
        $.post('./api/ungood.php', {
            id
        }, (res) => {
            location.href = "?do=pop";
        })
    }
</script>