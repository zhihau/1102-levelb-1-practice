<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<?php include_once "marquee.php";?>
                    <div style="height:32px; display:block;"></div>
                                        <!--正中央-->
										<span class="t botli">更多消息顯示區
								

														</span>
														<ul class="ssaa" style="list-style-type:decimal;">
<?php
$all=$News->math('count','*',['sh'=>1]);
$div=5;
$pages=ceil($all/$div);
$now=$_GET['p']??1;
$start=($now-1)*$div;

	$rs=$News->all(['sh'=>1]," limit $start,$div");
foreach($rs as $k=>$r){
	?>
<li class="sswww"><?=mb_substr($r['text'],0,20);?>,,,
<div class="all" style="display:none"><?=$r['text']?></div>
</li>
	<?php
}
?>
                            	                            </ul>

                        <div style="text-align:center;">
						
						<?php
if(($now-1)>0){
    $pre=$now-1;
	?>
	<a class="bl" style="font-size:30px;" href="?do=news&p=<?=$pre?>">&lt;&nbsp;</a>
	<?php
}
for($i=1;$i<=$pages;$i++){
    $s=($i==$now)?"40px":"30px";
	?>
	<a class="bl" style="font-size:<?=$s?>;" href='?do=news&p=<?=$i?>'>&nbsp;<?=$i?></a>
	<?php
}
if(($now+1)<=$pages){
    $next=$now+1;
    
	?>
	<a class="bl" style="font-size:30px;" href="?do=news&p=<?=$next?>">&nbsp;&gt;</a>
	<?php
}
						?>
    
      
    </div>
	                </div>
                <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".sswww").hover(
							function ()
							{
								$("#alt").html(""+$(this).children(".all").html()+"").css({"top":$(this).offset().top-50})
								$("#alt").show()
							}
						)
						$(".sswww").mouseout(
							function()
							{
								$("#alt").hide()
							}
						)
                        </script>