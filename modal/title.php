	                     <!--正中央-->
                                   <?php
                                   include_once "../base.php"?>      
                          
                                    <p class="t cent botli">新增<?=$DB->upload;?></p>
        <form method="post" action="api/add.php?do=<?=$DB->table;?>" enctype="multipart/form-data">
            
    <table width="100%">
    	<tbody><tr>
        	<td width="45%"><?=$DB->upload;?></td><td>
               <input type="file" name="img">
            </td>
            </tr>
            <tr>
            <td width="45%">標題區替代文字：</td><td >
                <input type="text" name="text" >
            </td>
            <input type="hidden" name="sh" value="0">
                    </tr>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    
                                                
                