	                     <!--正中央-->
                         <?php
                                   include_once "../base.php"?>      
                          
                                    <p class="t cent botli">修改<?=$DB->upload;?></p>
        <form method="post" action="api/upload.php?do=<?=$DB->table;?>" enctype="multipart/form-data">
            
    <table width="100%">
    	<tbody><tr>
        	<td width="45%"><?=$DB->upload;?></td><td>
               <input type="file" name="img">
            </td>
            </tr>
            
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                    
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td class="cent"><input type="submit" value="修改"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    
                                                
                