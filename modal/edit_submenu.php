	                     <!--正中央-->
                                   <?php
                                   include_once "../base.php"?>      
                          
                                    <p class="t cent botli">編輯次選單</p>
        <form method="post" action="api/edit_submenu.php?do=<?=$DB->table;?>&id=<?=$_GET['id']?>" enctype="multipart/form-data">
            
    <table width="100%" id="mulist">
    	<tbody>
            <tr>
        	<td width="45%">次選單名稱</td>
            <td width="45%">
                次選單連結網址
            </td>
            <td>刪除</td>
            </tr>
<?php
$rows=$Menu->all(['parent'=>$_GET['id']]);
foreach($rows as $row){
?>
            <tr>
        	<td width="45%">
                <input type="text" name="name[]" value="<?=$row['name'];?>">
            </td>
            <td>
                <input type="text" name="href[]" value="<?=$row['href'];?>">
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
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td class="cent"><input type="submit" value="修改確定">
      <input type="reset" value="重置">
      <input type="button" value="更多次選單" onclick="more()">
    </td>
     </tr>
    </tbody></table>    

        </form>
                                    
        <script>
            function more(){
                let html=`
                <tr>
        	<td width="45%">
                <input type="text" name="name2[]" value="">
            </td>
            <td>
                <input type="text" name="href2[]" value="">
            </td>
            <td>
            </td>
            </tr>
                `;
$('#mulist').append(html);
            }
        </script>
                                                
                