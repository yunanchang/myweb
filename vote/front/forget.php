<fieldset>
    <legend>找回密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div>
        <input type="text" name="email" id="email">
    </div>
    <div id="result"></div>
    <div>
        <button onclick="forget()">尋找</button>
        <button onclick="forgetemail()">忘記信箱</button>
    </div>
</fieldset>

<script>
    function forget(){
        $.get('./api/forget.php',{email:$('#email').val()},(res)=>{
            $('#result').text(res)
            // console.log(res)
        })
    }
    function forgetemail(){
            alert('那就再創一個吧!');
            location.href='./index.php?do=reg';
        }
</script>