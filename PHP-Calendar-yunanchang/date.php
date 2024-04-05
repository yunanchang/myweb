<?php
// if (isset($_GET['month']) && isset($_GET['year'])) {
//     $month = $_GET['month'];
//     $year = $_GET['year'];
// } else {
//     $month = date('m');
//     $year = date("Y");
// }
echo "<h3 class='shadowed-link'>";
// echo date("西元 $year 年 $month 月");
$monthday=date("{$year}-{$month}-1");
echo date($year )."&nbsp&nbsp".date('F', strtotime($monthday));

echo '<div style="font-size: 30px; padding: 5px; text-align: center; margin-left: 10px;">';

echo '<a href="?year=', date('Y'), '&month=', date('n'), '">Today</a>';
echo '</div>';

echo "</h3>";

$thisFirstDay = date("{$year}-{$month}-1");
$thisFirstDate = date('w', strtotime($thisFirstDay));
$thisMonthDays = date("t", strtotime("{$year}-{$month}"));
$thisLastDay = date("{$year}-{$month}-$thisMonthDays");
$weeks = ceil(($thisMonthDays + $thisFirstDate) / 7);
// echo $thisFirstDate;
$firstCell = date("Y-m-d", strtotime("-$thisFirstDate days", strtotime($thisFirstDay)));
// echo $firstCell;
$nextYear = $year;
$prevYear = $year;
if (($month + 1) > 12) {
    $next = 1;
    $nextYear = $year + 1;
} else {
    $next = $month + 1;
}

if (($month - 1) < 1) {
    $prev = 12;
    $prevYear = $year - 1;
} else {
    $prev = $month - 1;
}

// echo $thisMonthDays ;
// echo $thisFirstDate ;
// echo $weeks;
?>

<div class="input">

    <form action="">
        <a href="?year=<?= $prevYear; ?>&month=<?= $prev; ?>">Last Month &nbsp&nbsp</a>
        <!-- 查詢 -->
<?php
function generateOptions($start, $end, $label, $selectedValue) {
    $options = "<label for=\"$label\">$label:</label>";
    $options .= "<select id=\"$label\" name=\"$label\">";
    for ($i = $start; $i <= $end; $i++) {
        $selected = ($i == $selectedValue) ? 'selected' : '';
        $options .= "<option value=\"$i\" $selected>$i</option>";
    }
    $options .= "</select>";
    return $options;
}

// 設定起始和結束年、月
$startYear = 1950;
$endYear = 2050;
$startMonth = 1;
$endMonth = 12;

// 獲取用戶提交的年份和月份，如果未提交則使用默認值
$selectedYear = isset($_GET['year']) ? $_GET['year'] : date('Y');
$selectedMonth = isset($_GET['month']) ? $_GET['month'] : date('n');

// HTML 部分

echo generateOptions($startYear, $endYear, 'year', $selectedYear);
echo generateOptions($startMonth, $endMonth, 'month', $selectedMonth);
echo '<input type="submit" value="submit">';




?>
        <!-- 查詢 -->
        <a href="?year=<?= $nextYear; ?>&month=<?= $next; ?>">&nbsp&nbsp Next Month</a>
    </form>
</div>
<table>
    <tr>
        <td>SUN</td>
        <td>MON</td>
        <td>TUE</td>
        <td>WED</td>
        <td>THU</td>
        <td>FRI</td>
        <td>SAT</td>
    </tr>
    <?php
    for ($i = 0; $i < $weeks; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            $addDays = 7 * $i + $j;
            // echo $addDays."add<br>";
            $thisCellDate = strtotime("+$addDays days", strtotime($firstCell));
            if ($thisCellDate == strtotime($today = date("Y-m-d"))) {
                echo "<td style=background:lightgreen>";
             
            } elseif (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) {
                echo "<td style='background:darkgreen'>";
            } else {
                echo '<td>';
            }

            // echo date("Y-m-d",$thisCellDate);
            if (date("m", $thisCellDate) == date("m", strtotime($thisFirstDay))) {
                echo date("j", $thisCellDate);
            }else{echo '<i class="fa-solid fa-mountain-sun" style="color:  #44618d;"></i>';}
            echo "</td>";
        }

        echo "</tr>";
    }


    ?>

</table>