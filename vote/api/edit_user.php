<?php include_once "db.php";
// dd($_POST);
unset($_POST['pw2']);
$User->save($_POST);
