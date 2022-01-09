<?php

include_once '../base.php';

$tt=$Total->find(1);
$tt['total']=$_POST['total'];
$Total->sav($tt);

to('../admin.php?do=total');
?>