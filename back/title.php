
                                <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli"><?=$DB->title;?></p>
        <form method="post" action="api/edit.php?do=<?=$DB->table;?>">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="45%">網站標題</td><td width="23%">替代文字</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
                    </tr>
                    <?php
                    $rows=$DB->all();
                    foreach($rows as $row){
                        $ch=$row['sh']==1?"checked":"";
                    ?>
                    <tr>
                        <td>
                            <img src="../img/<?=$row['img'];?>" style="    width: 300px ;height:30px">
                            </td>
                        <td>
                            <input type="text" name="text[]" value="<?=$row['text'];?>">
                        </td>
                        <td>
                            <input type="radio" name="sh" value="<?=$row['id'];?>" <?=$ch;?>>
                        </td>
                        <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        <td>
                        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/upload.php?do=title&id=<?=$row['id'];?>&#39;)" value="更新圖片">
                        </td>
</tr>
<input type="hidden" name="id[]" value="<?=$row['id'];?>">
<?php
}
?>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/title.php?do=title&#39;)" value="新增網站標題圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
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
                             