<?php

include_once "../base.php";

if($_POST['acc']=="admin"&&$_POST['pw']=="1234"){
    to('../back.php');
}else{
    echo "<script>";
    echo "alert('帳號或密碼錯誤');";
    echo "location.href='../index.php?do=main';";
    echo "</script>";
}
