<center>
    <div style="width:800px;">
        <table width="100%" border="0">
            <tr>
                <td align="center" width="110" valign="top"><img src="<?=base_url('design/kmsci.png')?>" width="110" height="110"></td>
                <td align="center"><h2>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.<br><small style="font-weight:normal;">Sudapin Kidapawan City<br>Telephone: 577-4553</small></h2><h1>REQUISITION SLIP</h1></td>
            </tr>
        </table>                 
        <table width="100%" border="0">
            <tr>
                <td><b>
                    Requisition No.: <u><?=$pono;?></u><br>
                    Date: <u><?=date('F d, Y', strtotime($item['date_requested']));?></u><br>
                    Requested by: <u><?=$item['requested_by'];?></u><br>
                    Department/Project: <u><?=$project['projectname'];?></u><br>
                    </b>    
                </td>
            </tr>
        </table>
        <br>     
        <table width="100%" border="0" cellspacing="5" cellpadding="5">
            <tr>
                <td align="center" width="20%"><b>DESCRIPTION</b></td>
                <td align="center" width="10%"><b>QUANTITY</b></td>
                <td align="center" width="30%"><b>SUPPLIER</b></td>
                <td align="center" width="20%"><b>UNIT PRICE</b></td>
                <td align="center" width="20%"><b>AMOUNT</b></td>
            </tr>
            <?php
            $total_cost = 0;
                foreach($requests as $item){
                    $total_cost += $item['quantity'] * $item['unitcost'];
                    echo "<tr>";
                        echo "<td style='border-bottom: 1px solid #000;'>".$item['description']."</td>";
                        echo "<td align='center' style='border-bottom: 1px solid #000;'>".$item['quantity']."</td>";
                        echo "<td align='center' style='border-bottom: 1px solid #000;'>".$item['suppliername']."</td>";
                        echo "<td align='right' style='border-bottom: 1px solid #000;'>".number_format($item['unitcost'], 2)."</td>";
                        echo "<td align='right' style='border-bottom: 1px solid #000;'>".number_format($item['quantity'] * $item['unitcost'], 2)."</td>";
                    echo "</tr>";
                }
            ?>
            <tr>
                <td colspan="4" align="right"><b>TOTAL</b></td>
                <td align="right" style='border-bottom: 1px solid #000;'><b><?=number_format($total_cost, 2);?></b></td>
            </tr>
        </table> 
        <table width="100%" border="0" cellspacing="5" cellpadding="5">
            <tr>
                <td><b><i>Requested by:</i></b></td>
                <td><b><i>Reviewed by:</i></b></td>
                <td><b><i>Noted by:</i></b></td>
            </tr>  
            <tr>
                <td colspan="3" align="center"></td>
            </tr>  
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Department Head</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Finance Officer</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Chief Executive Officer</b></td>
            </tr> 
        </table>
        <table width="100%" border="0" cellspacing="5" cellpadding="5">
            <tr>
                <td><b>APPROVED BY:</b></td>
                <td></td>
                <td></td>
            </tr>  
            <tr>
                <td colspan="3" align="center"></td>
            </tr>  
            <tr>
                <td width="30%"><b>Chief Hospital Director</b></td>
                <td><b>Corporate Treasurer</b></td>
                <td></td>
            </tr> 
        </table>
    </div>
</center>