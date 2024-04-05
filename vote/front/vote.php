
<?php

$que = $Que->find($_GET['id']);

?>

<div class="box">
    <div class="d-flex justify-content-center align-items-center">
        <h3><?= $que['text']; ?></h3>
        <span class="ms-2 text-white"><?= $que['type']; ?></span>
    </div>

    <form action="./api/vote.php" method="post">
        <?php

        $opts = $Que->all(['subject_id' => $_GET['id']]);
        foreach ($opts as $opt) {
            echo "<div>";
            echo "<input type='radio' name='opt' value='{$opt['id']}'checked>";
            echo $opt['text'];
            echo "</div>";
        }
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</div>