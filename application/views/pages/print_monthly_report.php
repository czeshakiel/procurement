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
                <th colspan="4" align="left">Report Type: <?php
                if($type=="requested"){
                    echo "Requisition Report";
                }
                ?>
                </th>
            </tr>
            <tr>
                <th colspan="4" align="left">Date Range: <?=date('M-d-Y', strtotime($startdate));?> to <?=date('M-d-Y', strtotime($enddate));?></th>
            </tr>
            <tr>
                <th colspan="4" align="left">Project Name: <?=$projectname;?></th>
            </tr>
        </table>
        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
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
                    $query = $this->Procurement_model->getAllRequestsByProject($project_id,$startdate,$enddate);
                        if(count($query) > 0){
                    ?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                            <th align="center" style="border-right: 1px solid #000; border-bottom: 1px solid #000;" width="50%">Materials</th>
                            <th align="center" style="border-bottom: 1px solid #000;" width="50%">Labor</th>
                        </tr>
                        <tr>
                            <th style="border-right: 1px solid #000;" width="50%" align="center">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 12px;">
                                    <tr>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Description</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="10%">Qty</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Price</th>
                                        <th align="center" style="border-bottom: 1px solid #000;" width="30%">Total</th>
                                    </tr>
                                    <?php
                            $totalamount = 0;
                            foreach($query as $request){
                                $request_id = $request['pono'];
                                $date_requested = date('m/d/Y', strtotime($request['date_requested']));
                                $requested_by = $request['requested_by'];
                                echo "<tr>";
                                    echo "<td>".$request['description']."</td>";
                                    echo "<td align='center'>".$request['quantity']."</td>";
                                    echo "<td align='right'>".number_format($request['unitcost'], 2)."</td>";
                                    echo "<td align='right'>".number_format($request['unitcost'] * $request['quantity'], 2)."</td>";
                                echo "</tr>";
                                $totalamount += $request['unitcost'] * $request['quantity'];
                            }
                        ?>
                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th align="right" style="border-top: 1px solid #000;" colspan="3">Total:</th>
                                <th align="right" style="border-top: 1px solid #000;" width="25%"><?=number_format($totalamount, 2);?></th>
                        </table>
                    <?php
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }else{

            }
            ?>
        </table>
    </div>
</center>