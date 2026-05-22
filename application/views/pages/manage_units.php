<div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0"><?=$title;?></h3>
                            <div class="col-auto d-flex w-sm-100">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100 addUnit" data-bs-toggle="modal" data-bs-target="#unitadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Unit</button>
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
                  <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Description</th>                                                                                    
                                            <th width="10%">Actions</th>  
                                        </tr>
                                    </thead>
                                    <?php
                                        $x=1;                                        
                                        foreach($units as $item){                                                                                   
                                            echo "<tr>";
                                            echo "<td>".$x."</td>";
                                            echo "<td>".$item['description']."</td>";                                                                                                             
                                            echo "<td>";
                                            ?>  
                                                 <button type="button" class="btn btn-outline-secondary btn-sm editUnit" data-bs-toggle="modal" data-bs-target="#unitadd" data-id="<?=$item['description'].'_'.$item['id'];?>"><i class="icofont-edit text-success"></i></button>
                                                <a href="<?=base_url('delete_units/'.$item['id']);?>" class='btn btn-sm btn-outline-danger' onclick="return confirm('Are you sure you want to delete this unit?'); return false;"><i class='icofont-ui-delete'></i></a>
                                                <?php
                                            echo "</td>";
                                            echo "</tr>";
                                            $x++;
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                  </div>
                </div><!-- Row End -->
            </div>
        </div>