<?php include_once "db.php";
// 
$user=$User->find(['acc'=>$_SESSION['user']]);
$username=$user['acc'];
// 
$currentDate = date("Y-m-d H:i:s");
dd($currentDate);
dd($_POST);
if(!empty($_POST['subject'])){
    // 
    if(isset($_FILES['img']['tmp_name'])){
        move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
        $_POST['img']=$_FILES['img']['name'];
       
    }
    // 
    $Que->save(['text'=>$_POST['subject'],'subject_id'=>0,'vote'=>0,'img'=>$_POST['img'],'type'=>$_POST['category'],'good'=>0,'date'=>$currentDate,'name'=>$username]);
    // $subject_id=$Que->find(['text'=>$_POST['subject']])['id'];  
    $subject_id=$Que->all(['text'=>$_POST['subject']]);  
    $subject_id=end($subject_id)['id'];
    // dd($subject_id);
    if(!empty($_POST['option'])){
        foreach($_POST['option'] as $option){
            $Que->save(['text'=>$option,'subject_id'=>$subject_id,'vote'=>0]);
        }
    }
}


to("../index.php?do=que");