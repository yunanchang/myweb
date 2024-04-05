<?php include_once "db.php";
dd($_POST);
echo '-------------------------------------------';
// 刪除log的Que ---------------
$logs=$Log->all(['que'=>$_POST['id']]);
dd($logs);
foreach($logs as $log){
  
    $Log->del($log['id']);

};

// 刪除log的Que end---------------




$DB=new DB($_POST['table']);
$DB->del($_POST['id']);

$rows=$DB->all(['subject_id'=>$_POST['id']]);
foreach($rows as $row){
    $DB->del($row['id']);
}