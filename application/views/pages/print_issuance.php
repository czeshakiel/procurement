<center>
    <div style="width:800px;">
        <table width="100%" border="0">
            <tr>
                <td align="center" width="110" valign="top"><img src="<?=base_url('design/kmsci.png')?>" width="110" height="110"></td>
                <td align="center"><h2>KIDAPAWAN MEDICAL SPECIALISTS CENTER, INC.<br><small style="font-weight:normal;">Sudapin Kidapawan City<br>Telephone: 577-4553</small></h2><h1>ISSUANCE SLIP</h1></td>
            </tr>
        </table>                 
        <table width="100%" border="0">
            <tr>
                <td><b>
                    Issuance ID: <u><?=$pono;?></u><br>
                    Date/Time Requested: <u><?=date('F d, Y', strtotime($item['datearray']));?> at <?=date('g:i A', strtotime($item['timearray']));?></u><br>                    
                    Requested by: <u><?=$item['username'];?></u><br>
                    Date/Time Released: <u><?=date('F d, Y', strtotime($item['issued_date']));?> at <?=date('g:i A', strtotime($item['issued_time']));?></u><br>
                    Issued by: <u><?=$item['username'];?></u><br>
                    Department/Project: <u><?=$project['projectname'];?></u><br>
                    </b>    
                </td>
            </tr>
        </table>
        <br>     
        <table width="100%" border="1" cellspacing="5" cellpadding="5" style="border-collapse: collapse;">
            <tr>
                <td align="center" width="5%"><b>No.</b></td> 
                <td align="center" width="30%"><b>RRNO</b></td>               
                <td align="center" width="20%"><b>DESCRIPTION</b></td>
                <td align="center" width="10%"><b>QUANTITY</b></td>
                <td align="center" width="10%"><b>STATUS</b></td>
            </tr>
            <?php
            $x=1;
            $total_cost = 0;
                foreach($requests as $item){                    
                    echo "<tr>";
                        echo "<td align='center'>".$x."</td>";
                        echo "<td align='center'>".$item['rrno']."</td>";
                        echo "<td align='center'>".$item['description']."</td>";
                        echo "<td align='center'>".$item['quantity']."</td>";
                        echo "<td align='center'>".$item['status']."</td>";
                      echo "</tr>";
                      $x++;
                }
            ?>
            
        </table> 
        <table width="100%" border="0" cellspacing="5" cellpadding="5">
            <tr>
                <td><b><i>Issued by:</i></b></td>
                <td><b><i>Received by:</i></b></td>                
            </tr>  
            <tr>
                <td colspan="2" align="center"></td>
            </tr>  
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Officer In-charge</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Requester</b></td>                
            </tr> 
        </table>        
    </div>
</center>