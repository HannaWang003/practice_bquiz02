<fieldset>
    <legend>忘記密碼</legend>
    <div>請輪入信箱以查詢密碼</div>
    <input type="text" name="email" id="email">
    <div id="res"></div>
    <input type="button" value="尋找" onclick="find()">
</fieldset>
<script>
    function find() {
        let result = $('#res');
        let email = $("#email").val();
        $.post('./api/forget.php', {
            email
        }, (res) => {
            if (res == 0) {
                result.text('查無此資料')
            } else {
                result.text(`您的密碼為:${res}`)
            }
        })
    }
</script>