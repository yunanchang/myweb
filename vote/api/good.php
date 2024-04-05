<?php include_once "db.php";

dd( $_POST);
$que=$Que->find($_POST['que']);

if($Log->count(['que'=>$_POST['que'],'acc'=>$_SESSION['user']])>0){
    //收回讚
    $Log->del(['que'=>$_POST['que'],'acc'=>$_SESSION['user']]);
    $que['good']--;
}else{
    //按讚
    $Log->save(['que'=>$_POST['que'],'acc'=>$_SESSION['user']]);
    $que['good']++;
}

$Que->save($que);

?>