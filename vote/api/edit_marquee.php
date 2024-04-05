<?php include_once "db.php";

dd($_POST);

foreach($_POST['id'] as  $key => $id){
    
        $row=$Ad->find($id);
        if(isset($row['text'])){
            $row['text']=$_POST['text'][$key];
            dd($row['text']);
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        }


        $Ad->save($row);
    
}

to("../back.php?do=$table");



