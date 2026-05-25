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
                    <div class="col-lg-4">                        
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
                                                        <span class="text-muted">400</span>
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
                                                <span class="text-muted">17</span>
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
                                                <span class="text-muted">06</span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <a href="<?=base_url('reports/'.$id);?>" class="col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-body ">
                                                <i class="icofont-file-text fs-3"></i>
                                                <h6 class="mt-3 mb-0 fw-bold small-14">Reports</h6>
                                                <span class="text-muted">14</span> 
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                       
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <div class="card teacher-card">
                            <div class="card-body  d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="<?=base_url('design/assets/images/lg/avatar3.jpg');?>" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                                       <h6 class="mb-0 fw-bold d-block fs-6 mt-2"><?=$project['contractor'];?></h6>
                                        <!-- <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>   -->
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6 class="mb-0 mt-2  fw-bold d-block fs-6"><?=$project['projectname'];?></h6>
                                    <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted"><?=$project['contractor'];?></span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>
                                            Budget Approved: <span class="text-success fw-bold"><?=number_format($project['amount_approved'], 2);?></span><br>
                                            Date Started: <span class="text-success fw-bold"><?=date('m/d/Y', strtotime($project['date_started']));?></span><br>
                                            Date Completed: <span class="text-success fw-bold"><?=date('m/d/Y', strtotime($project['date_ended']));?></span><br>
                                            Status: <span class="text-success fw-bold"><?=$project['status'];?></span><br>
                                        </p>
                                    </div>
                                    <!-- <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                        <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                        <a href="profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row End -->              
            </div>
        </div> 