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
                                        <form action="<?=base_url('search_item')?>" method="post">
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
                                                            <th width="25%">Supplier</th>
                                                            <th width="10%">Qty</th> 
                                                            <th width="15%">Unit Price</th>   
                                                            <th width="10%">Actions</th>  
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    if(count($items) > 0){
                                                        $x=1;
                                                        foreach($items as $item){
                                                            echo "<form action='".base_url('add_request_item')."' method='post'>";
                                                            echo "<input type='hidden' name='project_id' value='".$project_id."'>";
                                                            echo "<input type='hidden' name='code' value='".$item['code']."'>";
                                                            echo "<input type='hidden' name='pono' value='".$pono."'>";
                                                            $qry=$this->Procurement_model->getQty($item['code']);
                                                            $soh=0;
                                                            foreach($qry as $q){
                                                                $soh +=$q['quantity'];
                                                            }
                                                            $qry=$this->Procurement_model->getSuppliersByItemCode($item['code']);
                                                            echo "<tr>";
                                                            echo "<td>".$item['description']."</td>";
                                                            echo "<td>".$soh."</td>";
                                                            echo "<td>";                                                                
                                                            foreach($qry as $q){
                                                                echo "<input type='radio' name='preferred_supplier' value='".$q['suppliercode']."_".$q['suppliername']."' onclick='selectPrice(".$q['unitcost'].", ".$x.")'> ".$q['suppliername']." (".number_format($q['unitcost'], 2).")<br>";
                                                            }
                                                            ?>                                                        
                                                            <input type='radio' name='preferred_supplier' value='' checked onclick='selectPrice("", <?=$x?>)'> No Preferred Supplier
                                                            <select name='supplier' class='form-control form-control-sm'>
                                                                <option value=''>Select Supplier</option>
                                                                <?php foreach($suppliers as $supplier): ?>
                                                                    <option value='<?=$supplier['suppliercode'];?>_<?=$supplier['suppliername'];?>'><?php echo $supplier['suppliername']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php
                                                            echo "</td>";
                                                            echo "<td><input type='text' name='quantity' class='form-control form-control-sm' required></td>";
                                                            echo "<td><input type='text' name='unit_price' class='form-control form-control-sm' required id='unit_price$x'></td>";
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
                                $edit="style='display:none;'";
                            }
                            if($status=="pending"){
                                $print="style='display:none;'";
                                $save="";
                                $edit="style='display:none;'";
                            }
                            if($status=="finalized"){
                                $print="";
                                $save="style='display:none;'";
                                $edit="";
                            }
                            ?>
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Requested Items</h6>
                                        <div class="d-flex py-2 project-tab flex-wrap w-sm-100">
                                            <a href="<?=base_url('print_purchase_request/'.$pono)?>" class="btn btn-dark w-sm-100 createproject" target="_blank" <?=$print?>><i class="icofont-print me-2 fs-6"></i>Print Request</a>
                                            <a href="<?=base_url('finalize_purchase_request/'.$pono."/".$project_id)?>" class="btn btn-warning w-sm-100 createproject" onclick="return confirm('Are you sure you want to finalize this request?'); return false;" <?=$save?>><i class="icofont-download me-2 fs-6"></i>Finalize Request</a>                                            
                                            <a href="<?=base_url('revert_finalize_request/'.$pono."/".$project_id)?>" class="btn btn-info w-sm-100 createproject" onclick="return confirm('Are you sure you want to revert the finalization of this request?'); return false;" <?=$edit?>><i class="icofont-refresh me-2 fs-6"></i>Revert Finalize</a>                                            
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
                                                    <th>Actions</th>  
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach($requests as $request){
                                                $amount = $request['quantity'] * $request['unitcost'];
                                                echo "<tr>";
                                                echo "<td>".$request['description']."</td>";
                                                echo "<td>".$request['quantity']."</td>";
                                                echo "<td>".$request['suppliername']."</td>";
                                                echo "<td align='right'>".number_format($request['unitcost'], 2)."</td>";
                                                echo "<td align='right'>".number_format($amount, 2)."</td>";
                                                echo "<td align='center'>";
                                                ?>
                                                <a href="<?php echo base_url('delete_request_item/'.$request['id'].'/'.$pono.'/'.$project_id); ?>" class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure you want to delete this item?');" <?=$save;?>><i class="icofont-trash"></i> Delete</a>
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