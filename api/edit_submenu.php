<?php

include_once "../base.php";

$mainmenu_id=$_GET['id'];
foreach($_POST['name'] as $k=>$n){
    $DB->save(['id'=>$_POST['id'][$k],'name'=>$n,'href'=>$_POST['href'][$k],'parent'=>$mainmenu_id]);
}

foreach($_POST['name2'] as $k=>$n){
    $DB->save(['name'=>$n,'href'=>$_POST['href2'][$k],'parent'=>$mainmenu_id]);
}

        
    

to('../back.php?do='.$DB->table);