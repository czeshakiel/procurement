        <!-- Body: Body -->
        <div class="body d-flex py-3">
            <div class="container-xxl">                
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold py-3 mb-0"><?=$title;?></h3>
                            <div class="col-auto d-flex w-sm-100">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100 createOtherRequest" data-bs-toggle="modal" data-bs-target="#createOtherRequest" data-id="<?=$id;?>"><i class="icofont-plus-circle me-2 fs-6"></i>Create Request</button>
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
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Date & Time</th>
                                            <th>Date & Time Updated</th>                                                                     
                                            <th>Updated By</th>
                                            <th>Status</th>
                                            <th>Actions</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $x=1; foreach($requests as $request){                                             
                                            if($request['status'] == 'pending'){
                                                $edit="";
                                                $cancel="";
                                                $issue="";
                                            }
                                            if($request['status'] == 'issued' || $request['status'] == 'cancelled'){
                                                $edit="style='display:none;'";
                                                $cancel="style='display:none;'";
                                                $issue="style='display:none;'";
                                            }
                                            ?>
                                        <tr>
                                            <td><?=$x;?>.</td>
                                            <td><?=$request['description'];?></td>
                                            <td align="right"><?=number_format($request['amount'], 2);?></td>   
                                            <td><?=$request['datearray'].' '.$request['timearray'];?></td>                                            
                                            <td><?=$request['updated_date'].' '.$request['update_time'];?></td>
                                            <td><?=$request['updated_by'];?></td>
                                            <td><?=$request['status'];?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary editOtherRequest" data-bs-toggle="modal" data-bs-target="#createOtherRequest" data-id="<?=$request['project_id'].'_'.$request['description'].'_'.$request['datearray'].'_'.$request['id'].'_'.$request['amount'];?>" <?=$edit;?>>Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger cancelOtherRequest" data-bs-toggle="modal" data-bs-target="#cancelOtherRequest" data-id="<?=$request['project_id'].'_'.$request['id'];?>" <?=$cancel;?>>Cancel</a>
                                                <a href="#" class="btn btn-sm btn-success issueOtherRequest" data-bs-toggle="modal" data-bs-target="#issueOtherRequest" data-id="<?=$request['project_id'].'_'.$request['id'];?>" <?=$issue;?>>Issue</a>
                                            </td>  
                                        </tr>
                                        <?php $x++; } ?>
                                        <?php foreach($issuedrequests as $request){                                             
                                            if($request['status'] == 'pending'){
                                                $edit="";
                                                $cancel="";
                                                $issue="";
                                            }
                                            if($request['status'] == 'issued' || $request['status'] == 'cancelled'){
                                                $edit="style='display:none;'";
                                                $cancel="style='display:none;'";
                                                $issue="style='display:none;'";
                                            }
                                            ?>
                                        <tr>
                                            <td><?=$x;?>.</td>
                                            <td><?=$request['description'];?></td>
                                            <td align="right"><?=number_format($request['amount'], 2);?></td>   
                                            <td><?=$request['datearray'].' '.$request['timearray'];?></td>                                            
                                            <td><?=$request['updated_date'].' '.$request['update_time'];?></td>
                                            <td><?=$request['updated_by'];?></td>
                                            <td><?=$request['status'];?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary editOtherRequest" data-bs-toggle="modal" data-bs-target="#createOtherRequest" data-id="<?=$request['project_id'].'_'.$request['description'].'_'.$request['datearray'].'_'.$request['id'];?>" <?=$edit;?>>Edit</a>
                                                <a href="<?=base_url('update_other_request/'.$request['id'].'/'.$request['project_id'].'/cancelled');?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to cancel this request?');" <?=$cancel;?>>Cancel</a>
                                                <a href="<?=base_url('update_other_request/'.$request['id'].'/'.$request['project_id'].'/issued');?>" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to issue this request?');" <?=$issue;?>>Issue</a>
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