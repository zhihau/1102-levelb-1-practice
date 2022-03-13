<?php

include_once "../base.php";


foreach($_POST['id'] as $k=>$id){
    if(isset($_POST['del'])&&in_array($id,$_POST['del'])){
        $DB->del($id);
    }else{
        $r=$DB->find($id);
        switch($DB->table){
            case "title":
                $r['text']=$_POST['text'][$k];
                $r['sh']=($id==$_POST['sh'])?1:0;
                break;
            case "admin":
                $r['acc']=$_POST['acc'][$k];
                $r['pw']=$_POST['pw'][$k];
                break;
            case "menu":
                $r['name']=$_POST['name'][$k];
                $r['href']=$_POST['href'][$k];
                $r['sh']=isset($_POST['sh'])&&in_array($id,$_POST['sh'])?1:0;
                break;
           default:
                $r['text']=$_POST['text'][$k];
                $r['sh']=isset($_POST['sh'])&&in_array($id,$_POST['sh'])?1:0;
                break;
        }
        $DB->save($r);
    }
}
to('../back.php?do='.$DB->table);