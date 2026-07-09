 <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0"><?=$title;?></h3>                            
                        </div>
                    </div>
                </div>
                
                <div class="row g-3 mb-3 row-deck">
                    
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3 text-danger">Report Inventory</h6>
                                <div class="flex-grow-1">
                                    <div class="py-2 d-flex align-items-center border-bottom">
                                        <div class="d-flex ms-3 align-items-center flex-fill">
                                            <span class="avatar lg light-primary-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i class="icofont-file-text fs-5"></i></span>
                                            <div class="d-flex flex-column ps-3">
                                                <h6 class="fw-bold mb-0 small-14">Monthly Expense Report</h6>
                                            </div>
                                        </div>
                                        <a href="#" class="btn light-primary-bg text-end" data-bs-toggle="modal" data-bs-target="#generateMonthlyReport">Generate</a>
                                    </div>
                                    <div class="py-2 d-flex align-items-center border-bottom">
                                        <div class="d-flex ms-3 align-items-center flex-fill">
                                            <span class="avatar lg light-warning-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i class="icofont-send-mail fs-5"></i></span>
                                            <div class="d-flex flex-column ps-3">
                                                <h6 class="fw-bold mb-0 small-14">Issuance Report</h6>
                                            </div>
                                        </div>
                                        <a href="#" class="btn light-warning-bg text-end" data-bs-toggle="modal" data-bs-target="#generateMonthlyIssuanceReport">Generate</a>
                                    </div>
                                    <div class="py-2 d-flex align-items-center border-bottom">
                                        <div class="d-flex ms-3 align-items-center flex-fill">
                                            <span class="avatar lg light-info-bg rounded-circle text-center d-flex align-items-center justify-content-center"><i class="icofont-send-mail fs-5"></i></span>
                                            <div class="d-flex flex-column ps-3">
                                                <h6 class="fw-bold mb-0 small-14">Purchase Order/Requisition Report</h6>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                Select Project
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="<?=base_url('view_reports/all');?>">All Projects</a></li>
                                                <?php
                                                    $projects = $this->Procurement_model->getAllProjects();
                                                    foreach ($projects as $project) {
                                                        echo '<li><a class="dropdown-item" href="' . base_url("view_reports/$project[id]") . '">' . $project['projectname'] . '</a></li>';
                                                    }
                                                    ?>                                                
                                                    <li><a class="dropdown-item" href="<?=base_url('view_reports/17');?>">P/C Maintenance</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- Row End -->
                
            </div>
        </div> 