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
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Item List</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row g-3 mb-3">
                                              <div class="col-sm-12">
                                                <label for="fileimg" class="form-label">Item Name</label>
                                                <input type="text" class="form-control" name="description" placeholder="Select item">
                                              </div>
                                              <div class="col-sm-12">
                                                <label for="depone" class="form-label">Quantity</label>
                                                <input type="text" class="form-control" name="quantity" placeholder="Enter quantity">
                                              </div>
                                              <div class="col-sm-12">
                                                <label for="abc" class="form-label">Unit Price</label>
                                                <input type="text" class="form-control" name="unit_price" placeholder="Enter unit price">
                                              </div>
                                            </div>
                                            <div class="row g-3 mb-3">
                                                <div class="col-sm-12">
                                                    <label for="deptwo" class="form-label">Supplier</label>
                                                </div>                                                
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add Contact</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
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
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row End -->
                    </div>                
                </div>
            </div>
        </div>