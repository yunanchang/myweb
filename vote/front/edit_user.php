<style>input{margin: 2px;}</style>
<?php
// dd($_SESSION['user']);
$user = $User->find(['acc' => $_SESSION['user']]);
// dd( $user);
?>

<legend>會員資料修改</legend>
<table>
    <tr>
        <td class="clo">登入帳號</td>
        <td><input  style=" background-color: lightblue;" type="text" value="<?= $user['acc'] ?>" readonly></td>
    </tr>

    <!--  -->

    <tr>
        <td class="clo">Step1:登入密碼</td>
        <td>
            <input style="margin-left: 20px;" type="password" name="pw" id='pw' class="iconpw " value="<?= $user['pw'] ?>">
            <i class="fa fa-eye" id=togglepassword></i>

        </td>
    </tr>

    <!--  -->
    <tr>
        <td class="clo">Step2:再次確認密碼</td>
        <td><input type="password" name="pw2" id="pw2" class="iconpw" value="<?= $user['pw'] ?>">
            </td>
    </tr>
    <tr>
        <td class="clo">Step3:姓名</td>
        <td><input type="text" name="name" id="name" value="<?= $user['name'] ?>"></td>
    </tr>
    <tr>
        <td class="clo">Step4:信箱</td>
        <td><input type="text" name="email" id="email" value="<?= $user['email'] ?>"></td>
    </tr>
    <tr>
        <td>
            <input type="hidden" id="id" value="<?= $user['id'] ?>">
            <input type="button" value="修改" onclick="reg()">
        </td>
        <td>

            <input type="reset" value="清除">
        </td>
    </tr>
</table>

<script>
    function reg() {
        let user = {
            id: $('#id').val(),
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
            name: $("#name").val()
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
                        $.post('./api/edit_user.php', user, (res) => {
                            alert('修改完成')
                            // console.log(res)
                               location.href ='./index.php'

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
  
    $(document).ready(function() {
    const togglepassword = $("#togglepassword");
    const pw = $(".iconpw");

    togglepassword.on('click', function() {
        const type = pw.attr('type') === 'password' ? 'text' : 'password';
        pw.attr('type', type);
  
        $(this).toggleClass('fa-eye fa-eye-slash'); // 这里是调整的部分
    });
});
</script>