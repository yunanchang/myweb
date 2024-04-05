<fieldset>
    <legend>會員註冊</legend>
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
            <td class="clo">Step4:姓名</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="clo">Step5:信箱</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="註冊" onclick="reg()">
            </td>
            <td>

                <input type="reset" value="清除">
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
            name: $("#name").val(),
        }
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '' && user.name != '') {
            if (user.pw == user.pw2) {
                $.post("./api/chk_acc.php", {
                    acc: user.acc
                }, (res) => {
                    //console.log(res)
                    if (parseInt(res) == 1) {
                        alert("帳號重覆")
                    } else {
                        $.post('./api/reg.php', user, (res) => {
                            alert('註冊完成，歡迎加入')
                            location.href = './index.php';

                        })
                    }
                })
            } else {
                alert("兩次密碼錯誤")
            }
        } else {
            alert("不可空白")
        }
    }
</script>