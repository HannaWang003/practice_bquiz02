<style>
table {
    text-align: center;
    width: 80%;
    margin: auto;
}
</style>
<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
        <table>
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