<div class="row">
    <?php

    // <!-- 找出user name -->

    $user = $User->find(['acc' => $_SESSION['user']]);

    // <!-- 找出user name  end-->
    $ques = $Que->all(['name' => $user['acc']]);
    foreach ($ques as $que) {


        // 
        // 

    ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <?php
                    if (empty($que['img'])) {
                        $que['img'] = 'noimg.jpg';
                    }
                    ?>
                    <!-- title ------------------------>
                    <div class="d-flex justify-content-between align-items-center ">
                        <span class="text-info quetype">
                            <?= $que['type']; ?>
                        </span>
                        <span class="text-success">
                            <!-- 找使用者 -->
                            <?php
                            $user = $User->find(['acc' => $que['name']]);
                            ?>

                            <?= $user['name'] ?>
                            <!-- 找使用者 -->
                            <?= $que['date'] ?> 建立
                        </span>
                    </div>
                    <!-- title  end----------------------->
                    <img src="./img/<?= $que['img'] ?>" class="card-img-top queimg" alt="...">
                    <div>

                        <span class="card-title mg-">
                            <?= $que['text']; ?>
                        </span>
                        <!--  good------------------------------------------------>
                        <i class="fa-regular fa-star"></i>
                        <span><?= $que['good']; ?></span>
                        <?php
                        if (isset($_SESSION['user'])) {
                            if ($Log->count(['que' => $que['id'], 'acc' => $_SESSION['user']]) > 0) {
                                echo "<a href='Javascript:good({$que['id']})'>取消收藏</a>";
                            } else {
                                echo "<a href='Javascript:good({$que['id']})'>收藏</a>";
                            }
                        }

                        ?>
                        <!--  goodend-------------------------------------------------------->
                    </div>
                    <span><?= $que['vote'] ?>人已投票</span>
                    <span class="card-text"> <a href='?do=result&id=<?= $que['id']; ?>'>結果</a> </span>


                    <!--  -->
                    <div>
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo "<a href='?do=vote&id={$que['id']}'>參與投票</a>";
                        } else {
                            echo "請先登入";
                        }

                        ?>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div>

                        <div>
                            <button class="edit-btn btn btn-success" data-id="<?= $que['id']; ?>">編輯</button>
                            <button class="del-btn btn btn-danger" data-id="<?= $que['id']; ?>">刪除</button>

                        </div>
                    </div>
                    <!--  -->
                </div>

            </div>



        </div>
    <?php
    }
    ?>
</div>
<!-- ----------------------------------- -->
<script>
    function good(que) {
        $.post("./api/good.php", {
            que
        }, (e) => {
            // console.log(e)
            location.reload();

        })
    }

    $(".edit-btn").on("click", function() {
        let id = $(this).data('id');
        location.href = `?do=edit_que&id=${id}`;

    })

    $(".del-btn").on("click", function() {
        // 顯示確認對話框，並將結果存儲在 userConfirmed 變數中
        let userConfirmed = window.confirm("確定要刪除檔案嗎？");

        // 如果使用者確認刪除，執行刪除操作
        if (userConfirmed) {
            let id = $(this).data('id');
            $.post("./api/del_que.php", {
                id,
                table: 'que'
            }, (e) => {
                location.reload();

            });
        }
    });
</script>