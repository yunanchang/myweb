<?php include_once './db.php';

$user=$User->find(['email'=>$_GET['email']]);
if(empty($user)){
    echo "查無資料";
}else{
    echo '您的密碼:'.$user['pw'];
}