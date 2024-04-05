<?php include_once 'db.php';
// dd($_POST);

if(isset($_POST['opt'])){
    $opt = $Que->find($_POST['opt']);
    $opt['vote']++;
    // dd($opt);
    $Que->save($opt);
    $sub = $Que->find($opt['subject_id']);
    $sub['vote']++;
    $Que->save($sub);

}
// dd($_POST);
// echo '---------------------------';
// dd($opt);

to("../index.php?do=result&id={$sub['id']}");
