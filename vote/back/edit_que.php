<style>fieldset div{margin: 10px;}</style>
<fieldset>
    <legend>編輯問卷</legend>
    <?php $que = $Que->find($_GET['id']);
    ?>
    <form action="./api/edit_que2.php" method="post" enctype="multipart/form-data">
        <div style="display: flex  justify-content-center">

            <h3>問卷名稱</h3>
            <div>
                <input type="text" name="text" value="<?= $que['text'] ?>">
            </div>
        </div>
        <div>
            <label for="category">請選擇問卷類別：</label>
            <select id="category" name="type">
                <?php
                $categories = ['其他', '時事', '生活', '娛樂', '健康與運動', '旅遊', '藝術與文化', '財經'];

                // 輸出默認選中的選項
                echo '<option value="' . $que['type'] . '">' . $que['type'] . '</option>';

                // 從類別數組中刪除選定的選項
                $categories = array_diff($categories, [$que['type']]);

                // 輸出剩餘的選項
                foreach ($categories as $category) {
                    echo '<option value="' . $category . '">' . $category . '</option>';
                }
                ?>
            </select>

        </div>
        <div>
            <div>選項
                <input type="button" value="更多" onclick="more()">
                <input type="button" value="減少" onclick="less()">
            </div>
            <div id="opt">

                <!--  -->
                <?php
            $rows = $Que->all(['subject_id' => $que['id']]);
            foreach ($rows as  $row) {
            ?>
                <div class="container">
                    <input type="text" name="option[]" value="<?= $row['text'] ?>">
                    <span class="delete-icon" onclick="delkey(this)">
                        <i class="fas fa-minus-circle"></i>
                    </span>
                </div>
            <?php
            }
            ?>
                <!--  -->
            </div>
        </div>
        <div>
            <p>封面照片</p>
            <input type="file" name="img">
        </div>
        <div class="ct">
            <input type="hidden" name="id" value="<?= $que['id']; ?>">
            <input type="submit" value="送出"><input type="reset" value="清空">
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

    
    function delkey(element) {
        // 獲取要刪除的選項的父容器
        let parentContainer = $(element).closest('.container');

        // 檢查是否還有其他容器，如果沒有，則不執行刪除操作
        if ($('#opt .container').length > 1) {
            // 刪除整個選項容器
            parentContainer.remove();
        }

        // 檢查是否還有其他容器，如果沒有，可以進一步隱藏整個區域
        if ($('#opt .container').length === 0) {
            $('#opt').hide();
        }
    }
</script>