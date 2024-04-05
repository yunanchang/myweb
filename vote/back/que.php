<style>
    .card {
        margin: auto;
        width: 500px;
        height: 450px;
        margin-bottom: 30px;
        border-radius: 20px;
    }
    a{
        text-decoration: none;}
    .queimg {
        /* background-color: darkblue; */
        width: 100%;
        height: 300px;
    }

    .quetype {
        padding-left: 5px;

        transform: scale(1.5);
    }
    .ta{font-size: 25px;}
</style>
<!-- time ------------------------------------->


<a class='ta' href="#" onclick="sortDate('DESC')">
    日期
    <i id="sortIconDesc" class="fas fa-sort-down"></i>
</a>
<a  class='ta' href="#" onclick="sortDate('ASC')">
    日期
    <i id="sortIconAsc" class="fas fa-sort-up"></i>
</a>

<script>
    function sortDate(order) {
     
        const newURL = '?do=que&order=' + order;
        window.location.href = newURL;
    }
</script>
<?php
// if( isset($_GET['order'])){
//     $order="ORDER BY id {$_GET['order']}";
// }else{
//     $order='ORDER BY id DESC';
// }
?>
<!-- time  end--------------------------------------------------->
<!-- 人數-------------------------------------------------------- -->
<a class='ta' href="#" onclick="sortnum('DESC')">
    投票人數
    <i id="sortIconDesc" class="fas fa-sort-down"></i>
</a>
<a  class='ta' href="#" onclick="sortnum('ASC')">
投票人數
    <i id="sortIconAsc" class="fas fa-sort-up"></i>
</a>
<script>
    function sortnum(num) {
     
        const newURL = '?do=que&num=' + num;
        window.location.href = newURL;
    }
</script>
<?php
$order = 'ORDER BY id DESC';

if (isset($_GET['order'])) {
    if ($_GET['order'] === 'ASC' || $_GET['order'] === 'DESC') {
        $order = "ORDER BY id {$_GET['order']}";
    }
}

if (isset($_GET['num'])) {
    if ($_GET['num'] === 'ASC' || $_GET['num'] === 'DESC') {
        $order = "ORDER BY vote {$_GET['num']}";
    }
}
?>


<!-- 人數end-------------------------------------------------------- -->
<?php
// type篩選-------------------------------------------------
if (isset($_GET["colorSelect"]) && $_GET["colorSelect"] != '全部') {
    $selecttype = $_GET["colorSelect"];
    $conform = ['subject_id' => 0, 'type' => $selecttype];
} else {
    $conform = ['subject_id' => 0];
};
// type篩選end -------------------------------------------------

// <!-- 分業顯示 -->
$total = $Que->count($conform);
$div = 12;
$pages = ceil($total / $div);
$now = $_GET['p'] ?? 1;
$start = ($now - 1) * $div;
$rows = $Que->all($conform, "$order limit $start,$div");


// <!-- 分業顯示 end-->

$ques = $Que->all($conform);
$count = 0;
foreach ($rows as $key => $que) {
    // 在每 3 個 card 後加入一個新的 row 開始新的一行
    if ($count % 3 == 0) {
        echo '<div class="row">';
    }
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
                        $user=$User->find(['acc'=>$que['name']]);
                       
                       
                        ?>
                    
                         <?= $user['name'] ?>
                    <!-- 找使用者 -->
                        <?= $que['date'] ?> 建立
                    </span>
                </div>
                <!-- title  end----------------------->
                <img src="./img/<?= $que['img'] ?>" class="card-img-top queimg" alt="...">
                <div>

                    <span class="card-title m-2">
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

    // 在每 3 個 card 後加入 row 的結束標籤
    if ($count % 3 == 2 || $count == count($ques) - 1) {
        echo '</div>';
    }
    $count++;
}
?>
<!-- 前後葉顯示 -->
<div >
            
            <?php
                if($now>1){
                    $prev=$now-1;
                    echo "<a style='color: #F06200';  href='?do=$do&p=$prev'> < </a>";
                    echo "<a href='?do=$do&p=$prev' class='left-link2'>←</a>";
                }

                for($i=1;$i<=$pages;$i++){
                    $fontsize=($now==$i)?'24px':'16px';
                    echo "<a style='color: #F06200; font-size: $fontsize;' href='?do=$do&p=$i'>$i</a>";
                }

                if($now<$pages){
                    $next=$now+1;
                    echo "<a  style='color: #F06200'; href='?do=$do&p=$next'> > </a>";
                    echo "<a href='?do=$do&p=$next' class='right-link2'>→</a>";
                }
            ?>
        </div>    

<!-- 前後葉顯示end -->
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
        let userConfirmed = window.confirm("確定要刪除問卷嗎？");

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