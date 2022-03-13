	                     <!--正中央-->
                                   <?php
                                   include_once "../base.php"?>      
                          
                                    <p class="t cent botli">新增主選單</p>
        <form method="post" action="api/add.php?do=<?=$DB->table;?>" enctype="multipart/form-data">
            
    <table width="100%">
    	<tbody>
            <tr>
        	<td width="45%">主選單名稱</td><td>
                <input type="text" name="name" id="">
            </td>
            </tr>
            <tr>
        	<td width="45%">主選單連結</td><td>
                <input type="text" name="href" id="">
            </td>
            </tr>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    
                                                
                