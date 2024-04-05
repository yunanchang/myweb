<?php include_once './api/db.php';
?>
<!DOCTYPE html>
<html lang="zh-TW">
<html>

<head>
    <meta name='ltn:device' content='R' />
    <title>template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta property="og:site_name" name="application-name" content="自由時報電子報" />
    <meta name="author" itemprop="author" content="自由時報電子報" />
    <meta name="copyright" content="自由時報電子報" />
    <link rel="stylesheet" href="https://cache.ltn.com.tw/css/reset.css?2022315">
    <link rel="stylesheet" href="https://art.ltn.com.tw/assets/css/art_global.css?2022315">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:300,400,500,700,900" rel="stylesheet">

    <!-- bs5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .atag {
            display: inline-block;
            font-family: 'Noto Sans TC', '微軟正黑體';
            font-size: 18px;
            font-weight: 400;
            padding: 0 8px;
        }

        .art_footer {
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .newsimg {
         
            height: 200px;
        }

     
        .card {

            /* width: 400px; */
            height: 280px;
        }

        .link {
            bottom: 100px;
            position: fixed;
            display: inline-block;

            bottom: 100px;
            /* left: 50%; */

            transform: translateX(-50%);
        }
    </style>

<body id="art" style="width: 100%; height: 100%;">
    <!-- 共用Header 開始 -->
    <link rel="stylesheet" href="https://cache.ltn.com.tw/css/rwd_head_tail.css?20230808" />
    <link rel="stylesheet" href="https://cache.ltn.com.tw/css/rwd_head_cover.css?20230323" />

    <!-- Header 開始 -->
    <div class="ltnheader boxTitle boxText" data-desc="置頂選單">
        <div class="Hcon">
            <div class="logo">
                <a title="自由時報" href="https://www.ltn.com.tw" data-desc="自由時報" class="logo_B"><img src="https://cache.ltn.com.tw/images/rwd_ltnlogo.png" alt="自由時報" title="自由時報"></a>
                <a title="自由時報" href="https://www.ltn.com.tw" data-desc="自由時報" class="logo_S"><img src="https://cache.ltn.com.tw/images/logo_foot.png" alt="自由時報" title="自由時報"></a>
            </div>

            <!-- Header 選單 -->
            <div class="useMobi">
                <ul>
                    <li><a title="即時" href="https://news.ltn.com.tw/list/breakingnews" data-desc="即時">即時</a></li>
                    <li><a title="熱門" href="https://news.ltn.com.tw/list/breakingnews/popular" data-desc="熱門">熱門</a>
                    </li>
                    <li><a title="政治" href="https://news.ltn.com.tw/list/breakingnews/politics" data-desc="政治">政治</a>
                    </li>
                    <li><img class="newChannel" src="https://cache.ltn.com.tw/images/new.gif" alt="newChannel" title="newChannel"><a title="軍武" href="https://def.ltn.com.tw" data-desc="軍武">軍武</a></li>
                    <li><a title="社會" href="https://news.ltn.com.tw/list/breakingnews/society" data-desc="社會">社會</a>
                    </li>
                    <li><a title="生活" href="https://news.ltn.com.tw/list/breakingnews/life" data-desc="生活">生活</a></li>
                    <li><a title="健康" href="https://health.ltn.com.tw" data-desc="健康">健康</a>
                    <li><a title="國際" href="https://news.ltn.com.tw/list/breakingnews/world" data-desc="國際">國際</a></li>
                    <li><a title="地方" href="https://news.ltn.com.tw/list/breakingnews/local" data-desc="地方">地方</a></li>
                    <li><a title="蒐奇" href="https://news.ltn.com.tw/list/breakingnews/novelty" data-desc="蒐奇">蒐奇</a>
                    </li>
                    <li><a title="影音" href="https://video.ltn.com.tw" data-desc="影音">影音</a></li>
                    <li><a title="財經" href="https://ec.ltn.com.tw" data-desc="財經">財經</a></li>
                    <li><a title="娛樂" href="https://ent.ltn.com.tw" data-desc="娛樂">娛樂</a></li>
                    <li><a title="汽車" href="https://auto.ltn.com.tw" data-desc="汽車">汽車</a></li>
                    <li><a title="時尚" href="https://istyle.ltn.com.tw" data-desc="時尚">時尚</a></li>
                    <li><a title="體育" href="https://sports.ltn.com.tw" data-desc="體育">體育</a></li>
                    <li><a title="3C" href="https://3c.ltn.com.tw" data-desc="3C">3 C</a></li>
                    <li><a title="評論" href="https://talk.ltn.com.tw" data-desc="評論">評論</a></li>
                    <li><a title="藝文" href="https://art.ltn.com.tw" data-desc="藝文">藝文</a></li>
                    <li><a title="玩咖" href="https://playing.ltn.com.tw/" data-desc="玩咖">玩咖</a></li>
                    <li><a title="食譜" href="https://food.ltn.com.tw" data-desc="食譜">食譜</a></li>
                    <li><a title="地產" href="https://estate.ltn.com.tw" data-desc="地產">地產</a></li>
                    <li class="li_project"><a title="專區" href="https://features.ltn.com.tw/" data-desc="專區">專區</a></li>
                    <li class="li_TT"><a title="TAIPEI TIMES" href="http://www.taipeitimes.com/" data-desc="TAIPEI TIMES" target="_blank">TAIPEI TIMES</a></li>
                    <li><a title="求職" href="https://ltn_jobs.yes123.com.tw/index.asp" data-desc="求職" target="_blank">求職</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="width: 100%; height: 50px; background-color: #CD3160;">
        <ul style="display: flex; align-items: center; height: 100%; padding-left: 325px;">
            <li><a title="總覽" href="?" class="atag" style="color: white;">總覽</a>
            </li>
            <?php
            $news = $News->all();
            $types = [];
            foreach ($news as $n) {
                $types[] = $n['type'];
            }
            // 刪除重複
            $uniqueTypes = array_unique($types);
            foreach ($uniqueTypes as $type) {
            ?>
                <li>
                    <a title="<?= $type; ?>" href="?type=<?= $type; ?>" class="atag" style="color: white;"><?= $type; ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <!-- Content 內容 -->
  <div class="container">
  <div class="row ">
        <?php
       
        if (isset($_GET['type']) && !empty($_GET['type'])) {
            $filter = ['type' => $_GET['type']];
        } else {
            $filter = '';
        }
          // 分頁
        $total = $News->count($filter);
        $div = 8;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        $news = $News->all($filter, "limit $start,$div");
        // 分頁end
        $count = 0;
        foreach ($news as $n) {
            if ($count % 4 == 0 && $count != 0) {
                echo '</div><div class="row mt-4">';
            }
        ?>
            <div class="col-sm-3">
                <div class="card m-2" style="width: 18rem;">
                    <!-- <div class="card m-2"> -->
                    <a href="<?= $n['link'] ?>">
                        <img src="<?= $n['img'] ?>" class="card-img-top newsimg" alt="...">
                        <div class="card-body">
                            <p class="card-text" style="-webkit-line-clamp: 2; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical;">
                                <?= $n['title'] ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        <?php
            $count++;
        }
        ?>
    </div>
  </div>
    <!-- link -->
    <div style="text-align: center;">

        <div class="link">
            <?php
            $type=$_GET['type']??'';
            if ($now > 1) {
                $prev = $now - 1;
                echo "<a href='?p=$prev&type=$type'>←</a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? '26px' : '20px';
                echo "<a style='color: #F06200; font-size: $fontsize;' href='?p=$i&type=$type'>$i</a>";
            }
            if ($now < $pages) {
                $next = $now + 1;
                echo "<a href='?p=$next&type=$type' class='right-link'>→</a>";
            }
            ?>
        </div>
    </div>
    <!-- Footer 開始-->
    <footer class="art_footer boxTitle" data-desc="底部選單">
        <a href="https://www.ltn.com.tw/" data-desc="logo" title="logo">
            <img src="https://cache.ltn.com.tw/images/logo_foot.png" title="logo" alt="logo">
        </a>
        <p>自由時報版權所有不得轉載 <span>© 2024 The Liberty Times. All Rights Reserved.<span></p>
    </footer>
</body>

</html>