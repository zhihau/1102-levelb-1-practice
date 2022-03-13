<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">

<?php
$rs=$Ad->all(['sh'=>1]);
foreach($rs as $r){
    echo $r['text']."&nbsp;&nbsp;";
}
?>
   </marquee>