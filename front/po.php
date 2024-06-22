<style>
    .types {
        width: 20%;
    }

    .types a {
        display: block;
    }

    .news-list {
        width: 70%;
    }
</style>
<div class="nav">
    目前位置:首頁 >分類網誌><span class="type">慢性病防治</span>
</div>
<div style="display:flex;align-items:flex-start;">
    <fieldset class="types">
        <legend>分類網誌</legend>
        <a class="type-item" data-type="1">健康新知</a>
        <a class="type-item" data-type="2">菸害防治</a>
        <a class="type-item" data-type="3">癌症防治</a>
        <a class="type-item" data-type="4">慢性病防治</a>
    </fieldset>
    <fieldset class="news-list">
        <legend>文章列表</legend>
        <div class="list-items"></div>
        <div class="article"></div>
    </fieldset>
</div>
<script>
    getList(1)
    $('.type-item').on('click', function() {
        $('.type').text($(this).text());
        let type = $(this).data('type');
        getList(type);
    })

    function getList(type) {
        $.post('./api/getlist.php', {
            type
        }, function(res) {
            $('.list-items').html(res);
            $('.list-items').show();
            $('.article').hide();

        })
    }

    function getNews(id) {
        $.post('./api/getnews.php', {
            id
        }, (res) => {
            $('.article').html(res);
            $('.list-items').hide();
            $('.article').show();
        })
    }
</script>