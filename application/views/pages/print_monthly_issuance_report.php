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
                <th colspan="4" align="left">Type: Issuance Report</th>
            </tr>
            <tr>
                <th colspan="4" align="left">Date Range: <?=date('M-d-Y', strtotime($startdate));?> to <?=date('M-d-Y', strtotime($enddate));?></th>
            </tr>
            <tr>
                <th colspan="4" align="left">Project Name: <?=$projectname;?></th>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
            <?php
            if($project_id=="all"){
                echo "<tr>";
                $projects = $this->Procurement_model->getAllProjects();
                foreach($projects as $project){
                    $project_id = $project['id'];
                    $project_name = $project['projectname'];
                    echo "<td align='center'><b>$project_name</b></td>";
                }
                echo "</tr>";
                echo "<tr>";
                    foreach($projects as $project){
                    $project_id = $project['id'];
                    echo "<td align='center'>";
                    $query=$this->Procurement_model->getAllIssuanceByDate($project_id,$startdate,$enddate);
                        if(count($query) > 0){
                    ?>
                    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">                        
                        
                                    <tr>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Issuance ID</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Issuance Date</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Description</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="10%">Qty</th>                                        
                                    </tr>                                    
                                    <?php
                                            $totalamount = 0;
                                            foreach($query as $request){                                                
                                                $request_id = $request['issuance_id'];
                                                $qty=$this->Procurement_model->getAllIssuanceDetails($request_id);
                                                foreach($qty as $q){                                                
                                                    echo "<tr>";
                                                        echo "<td>".$request_id."</td>";
                                                        echo "<td>".date('M-d-Y', strtotime($request['date_issued']))."</td>";
                                                        echo "<td>".$q['description']."</td>";
                                                        echo "<td align='center'>".$q['quantity']."</td>";                                                        
                                                    echo "</tr>";                                                    
                                                }
                                            }
                                        ?>                                                                                                                    
                    </table>                     
                    <?php
                    }                                        
                }
                echo "</td>";
                echo "</tr>";
            }else{
               
                echo "<tr>";
                    echo "<td align='center'>";
                    $query=$this->Procurement_model->getAllIssuanceByDate($project_id,$startdate,$enddate);
                        if(count($query) > 0){
                    ?>
                    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">                        
                        
                                    <tr>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Issuance ID</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Issuance Date</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Description</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="10%">Qty</th>                                        
                                    </tr>                                    
                                    <?php
                                            $totalamount = 0;
                                            foreach($query as $request){                                                
                                                $request_id = $request['issuance_id'];
                                                $qty=$this->Procurement_model->getAllIssuanceDetails($request_id);
                                                foreach($qty as $q){                                                
                                                    echo "<tr>";
                                                        echo "<td>".$request_id."</td>";
                                                        echo "<td>".date('M-d-Y', strtotime($request['date_issued']))."</td>";
                                                        echo "<td>".$q['description']."</td>";
                                                        echo "<td align='center'>".$q['quantity']."</td>";                                                        
                                                    echo "</tr>";                                                    
                                                }
                                            }
                                        ?>                                                                                                                    
                    </table>
                    <?php
                    }
                    echo "</td>";
                
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</center>