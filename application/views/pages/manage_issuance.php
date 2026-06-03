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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Item List</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?=base_url('search_item_issuance')?>" method="post">
                                            <input type="hidden" name="project_id" value="<?=$project_id;?>">
                                            <input type="hidden" name="pono" value="<?=$pono;?>">
                                            <div class="row g-3 mb-3">
                                              <div class="col-sm-12">
                                                <label for="fileimg" class="form-label">Item Name</label>
                                                <input type="text" class="form-control" name="description" placeholder="Select item">
                                              </div>
                                            </div>
                                        </form>
                                            <div class="row g-3 mb-3">
                                                <?php
                                                if(count($items) > 0){
                                                ?>
                                                <table class="table table-hover align-middle mb-0" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Description</th> 
                                                            <th>SOH</th>                                                            
                                                            <th width="10%">Qty</th>                                                               
                                                            <th width="10%">Actions</th>  
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    if(count($items) > 0){
                                                        $x=1;
                                                        foreach($items as $item){
                                                            echo "<form action='".base_url('add_request_item_issuance')."' method='post'>";
                                                            echo "<input type='hidden' name='project_id' value='".$project_id."'>";
                                                            echo "<input type='hidden' name='code' value='".$item['code']."'>";
                                                            echo "<input type='hidden' name='pono' value='".$pono."'>";
                                                            $qry=$this->Procurement_model->getQty($item['code']);
                                                            $soh=0;
                                                            foreach($qry as $q){
                                                                $soh +=$q['quantity'];
                                                            }                                                            
                                                            echo "<tr>";
                                                            echo "<td>".$item['description']."</td>";
                                                            echo "<td>".$soh."</td>";                                                            
                                                            echo "<td><input type='text' name='quantity' class='form-control form-control-sm' required></td>";                                                            
                                                            echo "<td><input type='submit' class='btn btn-primary btn-sm' value='Add Item'></td>";
                                                            echo "</tr>";
                                                            echo "</form>";
                                                            $x++;
                                                        }
                                                    }else{
                                                        echo "<p>No items found.</p>";
                                                    }
                                                    ?>
                                                </table>
                                                <?php
                                                }                                               
                                                ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $status = "";
                            foreach($requests as $request){
                                $status = $request['status'];
                            }
                            if($status==""){
                                $print="style='display:none;'";
                                $save="style='display:none;'";                                
                            }
                            if($status=="pending"){
                                $print="style='display:none;'";
                                $save="";                                
                            }
                            if($status=="issued"){
                                $print="";
                                $save="style='display:none;'";                                
                            }
                            ?>
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Requested Items</h6>
                                        <div class="d-flex py-2 project-tab flex-wrap w-sm-100">
                                            <a href="<?=base_url('print_issuance/'.$pono)?>" class="btn btn-dark w-sm-100" target="_blank" <?=$print?>><i class="icofont-print me-2 fs-6"></i>Print Request</a>
                                            <a href="#" class="btn btn-warning w-sm-100 postIssuance" data-bs-toggle="modal" data-bs-target="#postIssuance" data-id="<?=$pono?>_<?=$project_id?>" <?=$save?>><i class="icofont-download me-2 fs-6"></i>Post Issuance</a>
                                        </div>
                                    </div>                                    
                                    <div class="card-body">
                                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Issuance ID</th>                                                       
                                                    <th>Description</th> 
                                                    <th>Quantity</th>                                                                                                                                                            
                                                    <th>Actions</th>  
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach($requests as $request){                                                
                                                echo "<tr>";
                                                echo "<td>".$request['issuance_id']."</td>";                                                
                                                echo "<td>".$request['description']."</td>";
                                                echo "<td>".$request['quantity']."</td>";                                                
                                                echo "<td align='center'>";
                                                ?>
                                                <a href="<?php echo base_url('delete_request_item_issuance/'.$request['code'].'/'.$pono.'/'.$project_id); ?>" class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure you want to delete this item?');" <?=$save;?>><i class="icofont-trash"></i> Delete</a>
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