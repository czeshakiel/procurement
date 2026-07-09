        <!-- Body: Body -->
        <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header p-0 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold py-3 mb-0"><?=$title;?></h3>                            
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">                    
                   <div class="row g-3 mb-3 row-deck">                    
                    <div class="col-lg-12">                        
                        <div class="card">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Transaction</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-4 row-deck">                                    
                                        <div class="col-md-6 col-sm-6">
                                            <a href="<?=base_url('purchase_request/'.$id);?>" class="col-md-12 col-sm-12">
                                                <div class="card">
                                                    <div class="card-body ">
                                                        <i class="icofont-cart fs-3"></i>
                                                        <h6 class="mt-3 mb-0 fw-bold small-14">Purchase Request</h6>
                                                        <span class="text-muted"><?=count($pending_request);?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>                                    
                                    <div class="col-md-6 col-sm-6">
                                        <a href="<?=base_url('receiving/'.$id);?>" class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body ">
                                                    <i class="icofont-shopping-cart fs-3"></i>
                                                <h6 class="mt-3 mb-0 fw-bold small-14">Receiving</h6>
                                                <span class="text-muted"><?=count($pending_request);?></span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <a href="<?=base_url('issuance/'.$id);?>" class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body ">
                                                    <i class="icofont-send-mail fs-3"></i>
                                                <h6 class="mt-3 mb-0 fw-bold small-14">Issuance</h6>
                                                <span class="text-muted"><?=count($pending_issuance);?></span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <a href="<?=base_url('other_request/'.$id);?>" class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body ">
                                                <i class="icofont-basket fs-3"></i>
                                                <h6 class="mt-3 mb-0 fw-bold small-14">Other Request</h6>
                                                <span class="text-muted"><?=count($pending_other_request)+count($issued_other_request);?></span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                       
                </div><!-- Row End -->              
            </div>
        </div> 