<?php

include_once '../base.php';

$tt=$Bottom->find(1);
$tt['bottom']=$_POST['bottom'];
$Bottom->sav($tt);

to('../admin.php?do=bottom');
?>