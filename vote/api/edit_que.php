<?php include_once "db.php";

dd($_POST);
if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
$newoptions = $_POST['option'];
dd($newoptions);
dd('------------');
$oldoptions = $Que->all(['subject_id' => $_POST['id']]);
dd($oldoptions);
// foreach($oldoptions as $oldoption){

//     dd($oldoption['text']);
// }
// foreach($newoptions as $newoption){

//     dd($newoption);
// }

foreach ($oldoptions as $key => $oldoption) {

    $oldoptions[$key]['text'] = $newoptions[$key];
    $Que->save($oldoptions[$key]);
    // dd( $oldoptions[$key]['text']);
    unset($_POST['option'][$key]);
    // Warning: Undefined 處理--------------------------
    if($oldoptions[$key]['text']==''){
        $Que->del($oldoptions[$key]['id']);
    }
     // Warning: Undefined 處理------------------------
}

// dd($oldoptions[$key]);
// dd($_POST['option']);
foreach ($_POST['option'] as $option) {
    $Que->save(['text' => $option, 'subject_id' => $_POST['id'], 'vote' => 0]);
}

dd('-------------------------------------------');



dd('-------------------------------------------');
// dd($_POST['option']);
// unset($_POST['option'][0]);



unset($_POST['option']);
$Que->save($_POST);
to("../index.php?do=que");