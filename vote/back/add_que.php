<style>fieldset div{margin: 10px;}

</style>
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post" enctype="multipart/form-data">
        <div style="display: flex  justify-content-center">

            <h3>問卷名稱</h3>
            <div>
                <input type="text" name="subject" class='me-3'>
            </div>
        </div>
        <div>
            <label for="category">請選擇問卷類別：</label>
            <select id="category" name="category">
                <option value="其他" >其他</option>
                <option value="時事" >時事</option>
                <option value="生活">生活</option>
                <option value="娛樂">娛樂</option>
                <option value="健康與運動">健康與運動</option>
                <option value="旅遊">旅遊</option>
                <option value="藝術與文化">藝術與文化</option>
                <option value="財經">財經</option>
                <!-- 可以繼續添加其他選項 -->
            </select>
        </div>
        <div>
            <div >選項
            <i class="fa-solid fa-plus-minus"></i>
                <input type="button" value="更多" onclick="more()">
                &nbsp
                <input type="button" value="減少" onclick="less()">
            </div>
            <div id="opt">
                <input type="text" name="option[]" style="margin-right: 19px;">
            </div>
        </div>
        <div>
            <h2>封面照片</h2>
            <input type="file" name="img">
        </div>
        <div class="ct">
            <input type="submit" value="送出">&nbsp&nbsp&nbsp&nbsp<input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
  function more() {
    let opt = `<div class="option-container">
                <input type="text" name="option[]">
                <span class="option-control delopt" onclick="delopt(this)"><i class="fas fa-minus-circle"></i></span>
              </div>`;
    $("#opt").append(opt);
  }

  function less() {
    // 获取所有选项
    let opts = $("#opt").children();

    // 如果只剩一个选项，则不执行删除操作
    if (opts.length > 1) {
      // 获取最后一个选项并删除
      let lastOpt = opts.last();
      lastOpt.remove();
    }
  }

  function delopt(element) {
    // 获取要删除的选项的父容器
    let parentContainer = $(element).parent();

    // 删除整个选项容器
    parentContainer.remove();
  }
</script>
</script>
