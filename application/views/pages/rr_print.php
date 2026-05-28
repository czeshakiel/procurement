<center>
    <div style="width:800px;">
        <table width="100%" border="0">
            <tr>
                <td align="center" width="110" valign="top"><img src="<?=base_url('design/kmsci.png')?>" width="110" height="110"></td>
                <td align="center"><h2>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.<br><small style="font-weight:normal;">Sudapin Kidapawan City<br>Telephone: 577-4553</small></h2><h2>RECEIVING REPORT</h2></td>
            </tr>
        </table>                 
        <table width="100%" border="0">
            <tr>
                <td><b>
                    Receving Report No.: <u><?=$rrno;?></u><br>
                    Date and Time: <u><?=date('m/d/Y', strtotime($order[0]['date_received']));?> | <?=date('h:i A', strtotime($order[0]['time_received']));?></u><br>                    
                    Purchase Order No.: <u><?=$order[0]['pono'];?></u><br>
                    </b>    
                </td>
            </tr>
        </table>
        <br>     
        <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
            <tr>
                <td align="center" width="20%"><b>DESCRIPTION</b></td>
                <td align="center" width="10%"><b>QUANTITY</b></td>
                <td align="center" width="30%"><b>SUPPLIER</b></td>
                <td align="center" width="20%"><b>UNIT PRICE</b></td>
                <td align="center" width="20%"><b>AMOUNT</b></td>
            </tr>
            <?php
            $total_cost = 0;
                foreach($item as $request){
                    $total_cost += $request['quantity'] * $request['unitcost'];
                    echo "<tr>";
                        echo "<td style='border-bottom: 1px solid #000;'>".$request['description']."</td>";
                        echo "<td align='center' style='border-bottom: 1px solid #000;'>".$request['quantity']."</td>";
                        echo "<td align='center' style='border-bottom: 1px solid #000;'>".$request['suppliername']."</td>";
                        echo "<td align='right' style='border-bottom: 1px solid #000;'>".number_format($request['unitcost'], 2)."</td>";
                        echo "<td align='right' style='border-bottom: 1px solid #000;'>".number_format($request['quantity'] * $request['unitcost'], 2)."</td>";
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
                <td><b><i>Received by:</i></b></td>                
            </tr>  
            <tr>
                <td colspan="3" align="center"></td>
            </tr>  
            <tr>
                <td><b>Name and Signature</b></td>                
            </tr> 
        </table>        
    </div>
</center>