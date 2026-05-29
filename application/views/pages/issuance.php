        <!-- Body: Body -->
        <div class="body d-flex py-3">
            <div class="container-xxl">                
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold py-3 mb-0"><?=$title;?></h3>
                            <div class="col-auto d-flex w-sm-100">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100 createIssuance" data-bs-toggle="modal" data-bs-target="#createIssuance" data-id="<?=$id;?>"><i class="icofont-plus-circle me-2 fs-6"></i>Create Issuance</button>
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
                <div class="row clearfix g-3">
                  <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Issuance ID</th>
                                            <th>Date Requested</th>
                                            <th>Requested By</th>                                                                     
                                            <th>Date Issued</th>
                                            <th>Issued By</th>
                                            <th>Status</th>
                                            <th>Actions</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $x=1; foreach($requests as $request){                                             
                                            
                                            ?>
                                        <tr>
                                            <td><?=$x;?>.</td>
                                            <td><?=$request['issuance_id'];?></td>
                                            <td><?=$request['date_requested'];?></td>                                                                                        
                                            <td><?=$request['requested_by'];?></td>
                                            <td><?=$request['date_issued'];?></td>                                                                                        
                                            <td><?=$request['issued_by'];?></td>
                                            <td><?=$request['status'];?></td>
                                            <td>
                                                <a href="<?=base_url('manage_issuance/'.$request['issuance_id'].'/'.$id);?>" class="btn btn-sm btn-primary">Manage</a>
                                            </td>  
                                        </tr>
                                        <?php $x++; } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  </div>
                </div><!-- Row End -->
            </div>
        </div>       
            </div>
        </div> 