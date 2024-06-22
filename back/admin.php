<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
        <table style="text-align:center;width:80%;margin:auto">
            <tr>
                <th class="clo">帳號</th>
                <th class="clo">密碼</th>
                <th class="clo">刪除</th>
            </tr>
            <?php
            $users = $User->all();
            foreach ($users as $user) {
            ?>
            <tr>
                <td><?= $user['acc'] ?></td>
                <td><?= str_repeat("*", mb_strlen($user['pw'])) ?></td>
                <td><input type="checkbox" name="del[]" value="<?= $user['id'] ?>"></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
        </div>
    </form>
</fieldset>

<h2>新增會員</h2>
<span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
<table>
    <tr>
        <td class="clo">Step1:登入帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="clo">Step2:登入密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="clo">Step3:再次確認密碼</td>
        <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td class="clo">Step4:信箱(忘記密碼時使用)</td>
        <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="新增" onclick="reg()"><input type="button" value="清除" onclick="clean()">
        </td>
        <td style="text-align:end">
        </td>
    </tr>
</table>

<script>
function clean() {
    $('input[type="text"],input[type="password"]').val("");
}

function reg() {
    let acc = $('#acc').val();
    let pw = $('#pw').val();
    let pw2 = $('#pw2').val();
    let email = $('#email').val();
    if (acc != "" && pw != "" && pw2 != "" && email != "") {
        if (pw == pw2) {
            $.post("./api/reg.php", {
                acc,
                pw,
                email
            }, (res) => {
                if (res == 1) {
                    alert("帳號重覆");
                } else {
                    alert("新增成功");
                    location.href = "?do=admin";
                }
            })
        } else {
            alert("密碼錯誤")
        }
    } else {
        alert("不可空白");
    }
}
</script>