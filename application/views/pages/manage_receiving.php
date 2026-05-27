<div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold py-3 mb-0"><?=$title;?></h3>                            
                        </div>
                    </div>
                </div> <!-- Row end  -->
                <?php
                    if($this->session->success){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?=$this->session->success;?>                            
                            </div>
                        <?php
                    }
                ?>
                <?php
                    if($this->session->error){
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Failed!</strong> <?=$this->session->error;?>                            
                            </div>
                        <?php
                    }                  
                ?>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="list-view">
                        <div class="row clearfix g-3">
                            <form method="post" action="<?=base_url('post_receiving');?>">
                                <input type="hidden" name="pono" value="<?=$pono;?>">
                                <input type="hidden" name="project_id" value="<?=$project_id;?>">
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Requested Items</h6>
                                        <div class="d-flex py-2 project-tab flex-wrap w-sm-100">
                                            <!-- <a href="<?=base_url('print_purchase_request/'.$pono)?>" class="btn btn-dark w-sm-100 createproject" target="_blank"><i class="icofont-send-mail me-2 fs-6"></i>Post</a> -->
                                            <a href="#" onclick="window.close();" class="btn btn-danger w-sm-100  text-white"><i class="icofont-exit me-2 fs-6"></i>Close</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Description</th> 
                                                    <th>Quantity</th>
                                                    <th>Supplier</th> 
                                                    <th>Unit Price</th>   
                                                    <th>Amount</th>
                                                    <th width="15%">Qty Received</th>  
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach($requests as $request){
                                                echo "<input type='hidden' name='code[]' value='".$request['code']."'>";
                                                echo "<input type='hidden' name='suppliercode[]' value='".$request['suppliercode']."'>";
                                                echo "<input type='hidden' name='suppliername[]' value='".$request['suppliername']."'>";
                                                echo "<input type='hidden' name='description[]' value='".$request['description']."'>";
                                                echo "<input type='hidden' name='unitcost[]' value='".$request['unitcost']."'>";
                                                $amount = $request['quantity'] * $request['unitcost'];
                                                echo "<tr>";
                                                echo "<td>".$request['description']."</td>";
                                                echo "<td>".$request['quantity']."</td>";
                                                echo "<td>".$request['suppliername']."</td>";
                                                echo "<td align='right'>".number_format($request['unitcost'], 2)."</td>";
                                                echo "<td align='right'>".number_format($amount, 2)."</td>";
                                                echo "<td align='center'>";
                                                ?>
                                                <input type="text" name="quantity[]" class="form-control form-control-sm qtyReceived" value="<?=$request['quantity']?>" style="text-align: center;">
                                                <?php
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row End -->
                    </div>                
                </div>
            </div>
        </div>