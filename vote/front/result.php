<?php

$que = $Que->find($_GET['id']);

?>
<h3><?= $que['text']; ?></h3>


<?php

$opts = $Que->all(['subject_id' => $_GET['id']]);
foreach ($opts as $opt) {
    $total = ($que['vote'] != 0) ? $que['vote'] : 1;
    $rate = round($opt['vote'] / $total, 2);

    // echo "<div style='width:95%;display:flex;align-items:center;margin:10px 0'>";
    // echo    "<div style='width:30%'>{$opt['text']}</div>";
    // echo    "<div style='width:".(40*$rate)."%;height:20px;background-color:#ccc'></div>";
    // echo    "<div style='width:20%'>{$opt['vote']}票(".($rate*100)."%)</div>";
    // echo "</div>";
?>
    <!--  -->
  
        <div style='width:95%;display:flex;align-items:center; margin:10px 0'>
            <div style='width:50%'><?= $opt['text'] ?></div>
            <div style='width:<?= (40 * $rate) ?>%; height:20px; background-color:lightblue'></div>
            <div style='width:20%'><?= $opt['vote'] ?>票(<?= ($rate * 100) ?>%)</div>
        </div>

    <!--  -->
<?php
}
?>
<div class="ct">
    <button onclick="location.href='?do=que'">返回</button>
</div>