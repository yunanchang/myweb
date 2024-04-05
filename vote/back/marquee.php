<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 5px solid;">
    <h2 class="t cent botli">動態文字</h2>
    <form method="post" action="./api/edit_marquee.php">
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="80%"></td>
                    <td width="10%">顯示</td>
         
                </tr>
                <?php

                $rows=$Ad->all();
                foreach($rows as $row){
                ?>
                <tr>
                    <td>
                        <input type="text" name="text[]" style="width:90%" value="<?=$row['text'];?>">
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                   
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                 
                      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
