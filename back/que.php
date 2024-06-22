<form action="./api/add_que.php" method="post">
    <fieldset>
        <legend>新增問卷</legend>
        <div style="display:flex">
            <div class="clo" style="width:200px;">問卷名稱</div>
            <div>
                <input type="text" name="subject" style="width:300px;">
            </div>
        </div>
        <div id="opt">
            <span class="clo">選項</span>
            <input type="text" name="option[]" style="width:300px;">
            <input type="button" value="更多" onclick="more()">
        </div>
        <div><input type="submit" value="新增">|<input type="reset" value="清空"></div>
    </fieldset>
</form>
<script>
function more() {
    let html = `
    <div>
        <span class="clo">選項</span>
        <input type="text" name="option[]" style="width:300px;">
    </div>
        `
    $('#opt').before(html);
}
</script>