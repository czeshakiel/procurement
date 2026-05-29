 <!-- Body: Body -->
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header p-0 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold py-3 mb-0"><?=$title;?></h3>
                            <div class="d-flex py-2 project-tab flex-wrap w-sm-100">
                                <button type="button" class="btn btn-dark w-sm-100 createproject" data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button>
                                <ul class="nav nav-tabs tab-body-header rounded ms-3 prtab-set w-sm-100" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#All-list" role="tab">All</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Started-list" role="tab">Started</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Approval-list" role="tab">On-going</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Completed-list" role="tab">Completed</a></li>
                                </ul>
                            </div>
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
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 flex-column">
                        <div class="tab-content mt-4">
                            <div class="tab-pane fade show active" id="All-list">
                                <div class="row g-3 gy-5 py-3 row-deck">
                                    <?php                                    
                                    foreach($all_projects as $item){
                                       $date1=date_create($item['date_started']);
                                        $date2=date_create(date('Y-m-d'));
                                        $diff=date_diff($date1,$date2);
                                        $days = $diff->format("%a");
                                        $accu_amount=0;
                                        $query = $this->Procurement_model->getAllReceivedRequests($item['id']);
                                        foreach($query as $request){
                                            if($request['status'] == 'received'){
                                                $qry=$this->Procurement_model->getAllRequestsDetails($request['pono']);
                                                foreach($qry as $details){
                                                    $accu_amount += $details['unitcost']*$details['quantity'];
                                                }
                                            }
                                        }
                                        $percent = ($accu_amount / $item['amount_approved']) * 100;
                                    ?>
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-info-bg">
                                                            <i class="icofont-dropbox"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold"><?=$item['projectname'];?></span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2"><?=$item['projectname'];?></h6>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary editproject" data-bs-toggle="modal" data-bs-target="#createproject" data-id="<?=$item['id'].'_'.$item['projectname'].'_'.$item['contractor'].'_'.$item['date_started'].'_'.$item['date_ended'].'_'.$item['amount_approved'];?>"><i class="icofont-edit text-success"></i></button>
                                                        <a href="<?=base_url('view_project/'.$item['id']);?>" class="btn btn-outline-secondary" title="View Details"><i class="icofont-external-link text-primary"></i></a>
                                                    </div>
                                                </div>                                                
                                                <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-money"></i>
                                                            <span class="ms-2"><?=number_format($item['amount_approved'], 2);?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock"></i>
                                                            <span class="ms-2"><?=$days;?> Days Past</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-group-students "></i>
                                                            <span class="ms-2"><?=$item['contractor'];?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-calendar"></i>
                                                            <span class="ms-2"><?=date('m/d/Y', strtotime($item['date_started']));?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h4 class="small fw-bold mb-0">Amount Accumulated</h4>
                                                    <span class="small light-danger-bg  p-1 rounded"><i class="icofont-money"></i> <?=number_format($accu_amount, 2);?></span>
                                                </div>
                                                <div class="progress" style="height: 8px;">                                                   
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: <?=$percent;?>%" aria-valuenow="<?=$accu_amount;?>" aria-valuemin="0" aria-valuemax="<?=$item['amount_approved'];?>"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                          
                                    <?php
                                    }
                                    ?>          
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Started-list">
                                <div class="row g-3 gy-5 py-3 row-deck">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        <?php                                    
                                        foreach($started_projects as $item){
                                        $date1=date_create($item['date_started']);
                                            $date2=date_create(date('Y-m-d'));
                                            $diff=date_diff($date1,$date2);
                                            $days = $diff->format("%a");
                                        ?>
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="lesson_name">
                                                            <div class="project-block light-info-bg">
                                                                <i class="icofont-dropbox"></i>
                                                            </div>
                                                            <span class="small text-muted project_name fw-bold"><?=$item['projectname'];?></span>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2"><?=$item['projectname'];?></h6>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <button type="button" class="btn btn-outline-secondary editproject" data-bs-toggle="modal" data-bs-target="#createproject" data-id="<?=$item['id'].'_'.$item['projectname'].'_'.$item['contractor'].'_'.$item['date_started'].'_'.$item['date_ended'].'_'.$item['amount_approved'];?>"><i class="icofont-edit text-success"></i></button>
                                                            <a href="<?=base_url('view_project/'.$item['id']);?>" class="btn btn-outline-secondary" title="View Details"><i class="icofont-external-link text-primary"></i></a>
                                                        </div>
                                                    </div>                                                
                                                    <div class="row g-2 pt-4">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-money"></i>
                                                                <span class="ms-2"><?=number_format($item['amount_approved'], 2);?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock"></i>
                                                                <span class="ms-2"><?=$days;?> Days Past</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-group-students "></i>
                                                                <span class="ms-2"><?=$item['contractor'];?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-calendar"></i>
                                                                <span class="ms-2"><?=date('m/d/Y', strtotime($item['date_started']));?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dividers-block"></div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <h4 class="small fw-bold mb-0">Amount Accumulated</h4>
                                                        <span class="small light-danger-bg  p-1 rounded"><i class="icofont-ui-clock"></i> 35 Days Left</span>
                                                    </div>
                                                    <div class="progress" style="height: 8px;">                                                   
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 42%" aria-valuenow="5000000" aria-valuemin="0" aria-valuemax="<?=$item['amount_approved'];?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                          
                                        <?php
                                        }
                                        ?>          
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Approval-list">
                                <div class="row g-3 gy-5 py-3 row-deck">
                                     <div class="row g-3 gy-5 py-3 row-deck">
                                        <?php                                    
                                        foreach($continuing_projects as $item){
                                        $date1=date_create($item['date_started']);
                                        $date2=date_create(date('Y-m-d'));
                                        $diff=date_diff($date1,$date2);
                                        $days = $diff->format("%a");
                                        $accu_amount=0;
                                        $query = $this->Procurement_model->getAllReceivedRequests($item['id']);
                                        foreach($query as $request){
                                            if($request['status'] == 'received'){
                                                $qry=$this->Procurement_model->getAllRequestsDetails($request['pono']);
                                                foreach($qry as $details){
                                                    $accu_amount += $details['unitcost']*$details['quantity'];
                                                }
                                            }
                                        }
                                        $percent = ($accu_amount / $item['amount_approved']) * 100;
                                    ?>
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-info-bg">
                                                            <i class="icofont-dropbox"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold"><?=$item['projectname'];?></span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2"><?=$item['projectname'];?></h6>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary editproject" data-bs-toggle="modal" data-bs-target="#createproject" data-id="<?=$item['id'].'_'.$item['projectname'].'_'.$item['contractor'].'_'.$item['date_started'].'_'.$item['date_ended'].'_'.$item['amount_approved'];?>"><i class="icofont-edit text-success"></i></button>
                                                        <a href="<?=base_url('view_project/'.$item['id']);?>" class="btn btn-outline-secondary" title="View Details"><i class="icofont-external-link text-primary"></i></a>
                                                    </div>
                                                </div>                                                
                                                <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-money"></i>
                                                            <span class="ms-2"><?=number_format($item['amount_approved'], 2);?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock"></i>
                                                            <span class="ms-2"><?=$days;?> Days Past</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-group-students "></i>
                                                            <span class="ms-2"><?=$item['contractor'];?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-calendar"></i>
                                                            <span class="ms-2"><?=date('m/d/Y', strtotime($item['date_started']));?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h4 class="small fw-bold mb-0">Amount Accumulated</h4>
                                                    <span class="small light-danger-bg  p-1 rounded"><i class="icofont-money"></i> <?=number_format($accu_amount, 2);?></span>
                                                </div>
                                                <div class="progress" style="height: 8px;">                                                   
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: <?=$percent;?>%" aria-valuenow="<?=$accu_amount;?>" aria-valuemin="0" aria-valuemax="<?=$item['amount_approved'];?>"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                          
                                        <?php
                                        }
                                        ?>          
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Completed-list">
                                <div class="row g-3 gy-5 py-3 row-deck">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        <?php                                    
                                        foreach($completed_projects as $item){
                                        $date1=date_create($item['date_started']);
                                        $date2=date_create(date('Y-m-d'));
                                        $diff=date_diff($date1,$date2);
                                        $days = $diff->format("%a");
                                        $accu_amount=0;
                                        $query = $this->Procurement_model->getAllReceivedRequests($item['id']);
                                        foreach($query as $request){
                                            if($request['status'] == 'received'){
                                                $qry=$this->Procurement_model->getAllRequestsDetails($request['pono']);
                                                foreach($qry as $details){
                                                    $accu_amount += $details['unitcost']*$details['quantity'];
                                                }
                                            }
                                        }
                                        $percent = ($accu_amount / $item['amount_approved']) * 100;
                                    ?>
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-info-bg">
                                                            <i class="icofont-dropbox"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold"><?=$item['projectname'];?></span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2"><?=$item['projectname'];?></h6>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary editproject" data-bs-toggle="modal" data-bs-target="#createproject" data-id="<?=$item['id'].'_'.$item['projectname'].'_'.$item['contractor'].'_'.$item['date_started'].'_'.$item['date_ended'].'_'.$item['amount_approved'];?>"><i class="icofont-edit text-success"></i></button>
                                                        <a href="<?=base_url('view_project/'.$item['id']);?>" class="btn btn-outline-secondary" title="View Details"><i class="icofont-external-link text-primary"></i></a>
                                                    </div>
                                                </div>                                                
                                                <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-money"></i>
                                                            <span class="ms-2"><?=number_format($item['amount_approved'], 2);?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock"></i>
                                                            <span class="ms-2"><?=$days;?> Days Past</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-group-students "></i>
                                                            <span class="ms-2"><?=$item['contractor'];?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-calendar"></i>
                                                            <span class="ms-2"><?=date('m/d/Y', strtotime($item['date_started']));?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h4 class="small fw-bold mb-0">Amount Accumulated</h4>
                                                    <span class="small light-danger-bg  p-1 rounded"><i class="icofont-money"></i> <?=number_format($accu_amount, 2);?></span>
                                                </div>
                                                <div class="progress" style="height: 8px;">                                                   
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: <?=$percent;?>%" aria-valuenow="<?=$accu_amount;?>" aria-valuemin="0" aria-valuemax="<?=$item['amount_approved'];?>"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                           
                                        <?php
                                        }
                                        ?>          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>