<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post"  action="../api/edit_bottom.php">
        <table width="100%">
            <tbody>
                <tr class="yel">

                    <td width="50%" style="text-align:right">頁尾版權資料：</td>
                    <td width="50%" style="text-align:left"><input type="text" name="bottom" id="" value="<?=$Bottom->find(1)['bottom']?>"></td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td width="200px"></td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>