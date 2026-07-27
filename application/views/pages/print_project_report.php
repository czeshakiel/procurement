<center>
    <div width="<?=$width;?>" style="margin: 0;">
        <table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
                <th colspan="4" align="center"><h3>Engineering Department</h3></th>
            </tr>
            <tr>
                <th colspan="4" align="center"><h4>Project Monitoring Management</h4></th>
            </tr>            
            
            <tr>
                <th colspan="4" align="left">Project Name: <b><?=$projectname;?></b></th>
            </tr>
            <tr>
                <th colspan="4" align="left">Approved Amount: <?=number_format($budget, 2);?></th>
            </tr>
        </table>
        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
            <?php           
                               
                    $query=$this->Procurement_model->getAllMaterials($project_id);
                        if(count($query) > 0){
                    ?>
                    
                        
                                    <tr>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="25%">Description</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="15%">Est. Qty</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="15%">Req. Qty</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="15%">Recv Qty</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="15%">Req Var (Est - Req)</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="15%">Recv Var (Req - Recv)</th>
                                    </tr>                                    
                                    <?php
                                            $totalamount = 0;
                                            foreach($query as $request){
                                               $requested=$this->Procurement_model->getRequested($project_id,$request['code']);
                                               $received=$this->Procurement_model->getReceived($project_id,$request['code']);
                                               $reqqty=0;
                                               foreach($requested as $req){
                                                   $reqqty +=$req['quantity'];
                                               }
                                               $recvqty=0;
                                               foreach($received as $recv){
                                                   $recvqty +=$recv['quantity'];
                                               }
                                                echo "<tr>";
                                                    echo "<td>".$request['description']."</td>";
                                                    echo "<td align='center'>".$request['quantity']."</td>";
                                                    echo "<td align='center'>".$reqqty."</td>";
                                                    echo "<td align='center'>".$recvqty."</td>";
                                                    echo "<td align='center'>".number_format($request['quantity'] - $reqqty)."</td>";
                                                    echo "<td align='center'>".number_format($reqqty - $recvqty)."</td>";
                                                echo "</tr>";
                                            }
                    }
                                    
            ?>
        </table>
    </div>
</center>