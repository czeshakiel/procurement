<div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold py-3 mb-0"><?=$title;?></h3>                            
                        </div>
                    </div>
                </div> <!-- Row end  -->
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
                                            <div class="row g-3 mb-3">
                                              <div class="col-sm-12">
                                                <label for="fileimg" class="form-label">Item Name</label>
                                                <input type="text" class="form-control" name="description" placeholder="Select item">
                                              </div>
                                            </div>
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
                                                        foreach($items as $item){
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
                                                                
                                                            }
                                                            ?>
                                                            <select name='supplier' class='form-control form-control-sm' required>
                                                                <option value=''>Select Supplier</option>
                                                                <?php foreach($suppliers as $supplier): ?>
                                                                    <option value='<?=$supplier['suppliercode'];?>_<?=$supplier['suppliername'];?>'><?php echo $supplier['suppliername']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php
                                                            echo "</td>";
                                                            echo "<td><input type='text' name='quantity' class='form-control form-control-sm' required></td>";
                                                            echo "<td><input type='text' name='unit_price' class='form-control form-control-sm' required></td>";
                                                            echo "<td><input type='submit' class='btn btn-primary btn-sm' value='Add Item'></td>";
                                                            echo "</tr>";
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
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Requested Items</h6>
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
                                                echo "<tr>";
                                                echo "<td>".$request['description']."</td>";
                                                echo "<td>".$request['quantity']."</td>";
                                                echo "<td>".$request['suppliername']."</td>";
                                                echo "<td>".$request['unitcost']."</td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
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