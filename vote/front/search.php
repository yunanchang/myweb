
<div class="row">
<?php
if(isset($_GET['value'])){
    $ques = $Que->q("SELECT * FROM `que` WHERE `text` LIKE '%{$_GET['value']}%' AND subject_id = 0;");
   
    if(empty($ques)) {
        echo '<h3>找不到問卷名稱</h3>';
    } else {
          foreach($ques as $que){
            // dd($que['id']);
            // ----------------------------------------------
            ?>
           
         <div class="col-md-4">
        <div class="card ">
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
                <div class="mt-3">
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo "<a href='?do=vote&id={$que['id']}'>參與投票</a>";
                    } else {
                        echo "請先登入";
                    }

                    ?>
                </div>
                <!--  -->

            </div>

        </div>
        </div>
     


            <?php
            // ----------------------------------------------
        }
  
       
    }
} else {
    echo '找不到問卷名稱';
}

?>
   </div>