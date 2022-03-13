
                                <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                <?php
                                // echo $DB->table;
if(isset($_POST['bottom'])){
    $b=$Bottom->find(1);
    $b['bottom']=$_POST['bottom'];
    $Bottom->save($b);
    
}
                                ?>
                                    <p class="t cent botli"><?=$DB->title;?></p>
        <form method="post" action="?do=bottom">
    <table width="100%">
    	<tbody><tr>
        	<td  class="yel"width="45%"><?=$DB->header;?></td><td>
                <input type="text" name="bottom" value="<?=$DB->find(1)['bottom'];?>">
            </td>
                    </tr>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
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