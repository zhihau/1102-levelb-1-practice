
                                <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli"><?=$DB->title;?></p>
        <form method="post" action="api/edit.php?do=<?=$DB->table;?>">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="45%"><?=$DB->header;?></td>
            <td width="23%"><?=$DB->append;?></td>
            <td width="7%">刪除</td>
           
                    </tr>
                    <?php
                    $all=$DB->math('count','*');
                    $div=4;
                    $pages=ceil($all/$div);
                    $now=$_GET['p']??1;
                    $start=($now-1)*$div;
                    $rows=$DB->all(" limit $start,$div");
                    foreach($rows as $k=>$row){
                    
                        $ch=$row['sh']==1?"checked":"";
                    ?>
                    <tr>
                        <td>
                            <textarea name="text[]" id="text" cols="30" rows="10"><?=$row['text'];?></textarea>
                            
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$ch;?>>
                        </td>
                        <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        
</tr>
<input type="hidden" name="id[]" value="<?=$row['id'];?>">
<?php
}
?>
    </tbody></table>
    <div>
        <?php
if(($now-1)>0){
    $pre=$now-1;
    echo "<a href='?do=news&p=$pre'> &lt; </a>";
}
for($i=1;$i<=$pages;$i++){
    $s=($i==$now)?"24px":"16px";
    echo "<a href='?do=news&p=$i' style='font-size:$s'> $i </a>";
}
if(($now+1)<=$pages){
    $next=$now+1;
    echo "<a href='?do=news&p=$next'> &gt; </a>";
}

        ?>
    </div>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/news.php?do=news&#39;)" value="<?=$DB->button;?>"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
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
                             