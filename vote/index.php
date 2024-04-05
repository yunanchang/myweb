<?php include_once './api/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>我ㄉ問卷</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jq -->
  <style>
    /*  會員標籤----------------------------------------------------------------------------------------*/
    .nav-member {
      position: relative;
    }


    .member-menu {
      display: none;
      list-style: none;
      padding: 0;
      position: absolute;
      top: 100%;
      /* 將下拉選單放在 nav 下方 */
      left: 0;
      background-color: white;
      border: 1px solid #ccc;
      z-index: 1;
      /* 提高層級，使下拉選單在其他元素之上 */
    }

    .member-menu li {
      margin: 5px 0;
    }

    /* 將會員連結樣式化 */
    #memberLink {
      cursor: pointer;
      text-decoration: underline;
    }

    .noline {
      text-decoration: none !important;

    }

    /* 會員標籤 end-----------------------------------------------------------------------------------*/
    /* 共用Css+++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    .card {
      margin: auto;
      width: 500px;
      height: 450px;
      margin-bottom: 30px;
      border-radius: 20px;

    }

    .card:hover {
      background-color: #965011;
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 6); 
    }

    .queimg {

      width: 100%;
      height: 300px;
    }

    .quetype {
      padding-left: 5px;

      transform: scale(1.5);
    }
    #queryValue {
            border: 1px solid #ccc;
            transition: border-color 2s ease;
            color: #119656;
            background-color:#E3FAFF;
            border-radius: 5px;
        }
        select {
    background-color: #f8f8f8;
    border: 1px solid #ccc;
    padding: 5px;
    border-radius: 5px;
    font-size: 14px;
}
.mybtn {
            display: inline-block;
        
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border: 2px solid #3498db;
            border-radius: 5px;
            color: #3498db;
            background-color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* 滑鼠懸停時的效果 */
        .mybtn:hover {
            background-color: #3498db;
            color: #fff;
        }
    /* 共用Css+++++++++++++++++++++++++++++++++++++++++++++++++++++ */
  </style>
</head>

<body>
  <!-- time ------------------------------------->


  <!-- time  end--------------------------------------------------->
  <div class="container-fulid">
    <!-- nav --------------------------------->
    <ul class="nav">
      <li class="nav-item nav-member">
        <a class="nav-link active mt-1" aria-current="page" href="index.php">首頁</a>
      </li>
      <!--  -->
      <?php
      if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
        echo '<li>
      <a class="nav-link active mt-1" aria-current="page" href="back.php">後台</a>
    </li>';
      }
      ?>

      <!--  -->
      <li class="nav-item mt-1">
        <?php
        if (!isset($_SESSION['user'])) {
        ?>
          <a class="nav-link" href="?do=reg">註冊</a>
        <?php
        }
        ?>
      </li>
      <li class="nav-item mt-1">
        <?php
        if (!isset($_SESSION['user'])) {
        ?>
          <a class="nav-link" href="?do=login">會員登入</a>
        <?php
        } else {
        ?>

      <li class="nav-item mt-1">
        <a class="nav-link" href="?do=add_que">建立問卷</a>
      </li>
      <li class="nav-item">

      </li>
      <!-- 找出user name -->
      <?php
          $user = $User->find(['acc' => $_SESSION['user']]);
          $username = $user['name'];
      ?>
      <!-- 找出user name  end-->
      <!--查看會員資料---------------------------------  -->
      <li class="nav-item nav-member nav-link mt-1">
        <a href="#" id="memberLink" class="fa-solid fa-circle-user noline"><?= $username; ?>&nbsp&nbsp查看會員資料 </a>
        <ul class="member-menu">
          <li><a href="./index.php?do=edit_user">編輯會員資料</a></li>
          <!-- <li><a href="?do=ss">查看已投票主題(未完成)</a></li> -->
          <li><a href="./index.php?do=user_que">查看已建立投票</a></li>
          <li><a href="./index.php?do=vote_log">查看已收藏</a></li>
          <!-- 判斷是不適admin -->
          <?php


          if ($_SESSION['user'] == 'admin') {
            $link = './back.php';
          } else {
            $link = 'javascript:void(0);'; // 設置一個空的 JavaScript 腳本
          }
          ?>

          <li><a href="<?= $link ?>" onclick="checkAdmin()">後台</a></li>

          <script>
            function checkAdmin() {
              <?php if ($_SESSION['user'] != 'admin') { ?>
                alert("你不是管理者");
                alert("管理者帳號:admin 密碼:1234 ");
                return false; // 防止點擊連結
              <?php } ?>
            }
          </script>

          <!-- 判斷是不適admin end -->
          <li>
            <hr>
          </li>
          <li><a href='./api/logout.php'><i></i>登出</a></li>
        </ul>
      </li>
      <!--查看會員資料end---------------------------------  -->

    <?php
        }

    ?>
    </li>
    <!-- 分類顯示 -->
    <li class="nav-item ">
    <li class="nav-link">
      <select name="type" id="colorSelect" onchange="changeContent()">
        <option>選擇類型</option>
        <option value="全部">全部</option>
        <option value="其他">其他</option>
        <option value="時事">時事</option>
        <option value="生活">生活</option>
        <option value="娛樂">娛樂</option>
        <option value="健康與運動">健康與運動</option>
        <option value="旅遊">旅遊</option>
        <option value="藝術與文化">藝術與文化</option>
        <option value="財經">財經</option>
      </select>
    </li>
    </li>
    <!-- 分類顯示END -->

    <!-- 資料查詢 -->
    <li class="nav-link">
      <form id="queryForm">
        <label for="queryValue">問卷查詢：</label>
        <input type="text" id="queryValue" name="queryValue" required>
        <button  class="mybtn" type="button" onclick="submitQuery()">提交</button>
      </form>
    </li>
    <!-- 資料查詢end -->

    </ul>
    <!-- nav  end---------------------------->

    <!-- marquee ----------------------------------------------->
    <div class="marquee">
      <?php
      include "./front/marquee.php";
      ?>
    </div>
    <!-- marquee end -------------------------------------------->
    <!-- carousel -------------------------------------------->

    <!-- carousel end------------------------------------------------->
    <!-- 自製----------------------------- --------------------->
    <div class="main">
      <?php
      $do = $_GET['do'] ?? 'que';
      $file = "./front/{$do}.php";
      if (file_exists($file)) {
        include $file;
      } else {
        include "./front/que.php";
      }

      ?>
    </div>

    <!-- 自製 end----------------------------- -->
    <!-- end -->

  </div>



  <script>
    // 會員標籤----------------------------------------------------------------------------------------
    $(document).ready(function() {
      // 點擊會員連結時顯示或隱藏會員選單
      $("#memberLink").on("click", function(e) {
        e.preventDefault();
        $(".member-menu").toggle();
      });
    });
    // 會員標籤end-------------------------------------------------------------------------------------
    function changeContent() {
      // 選擇種類
      let selectedColor = $("#colorSelect").val();
      // alert(selectedColor)
      location.href = `./?do=que&colorSelect=${selectedColor}`;
      // $.get("./test.php", {selectedColor}, () => {
      //       // location.href = "./test.php";
      //   })

    }

    function submitQuery() {

      var queryValue = document.getElementById("queryValue").value;

      // 檢查輸入值是否為空
      if (queryValue.trim() === "") {
        alert('請輸入查詢值');
      } else {

        var targetURL = "?do=search&value=" + encodeURIComponent(queryValue);


        window.location.href = targetURL;
      }
    }


    const inputElement = document.getElementById('queryValue');

    inputElement.addEventListener('focus', function() {
    this.style.transition = 'border-color 2s ease'; // 調整過渡時間
    this.style.borderColor = 'red';
});

inputElement.addEventListener('blur', function() {
    this.style.transition = 'border-color 2s ease'; // 調整過渡時間
    this.style.borderColor = '#ccc';
});
  </script>




</body>

</html>
