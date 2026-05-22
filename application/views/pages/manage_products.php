<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><?=$title;?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('main');?>"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url('products');?>"><i class="zmdi zmdi-basket"></i> Products</a></li>
                        <li class="breadcrumb-item">Manage Product</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
        <?php
            if($this->session->success){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?=$this->session->success;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                <?php
            }
        ?>
        <?php
            if($this->session->failed){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed!</strong> <?=$this->session->failed;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                <?php
            }
            $sku="";$description="";$unitcost="";$srp="";$category="";$reorder="";$location="";
            if($item){
                // $sku = $item->sku;
                // $description = $item->description;
                // $unitcost = $item->unitcost;
                // $srp = $item->srp;
                // $category = $item->category;
                // $reorder = $item->reorder;
                // $location = $item->location;
            }
        ?>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Item Details</strong></h2>
                        </div>
                        <?=form_open(base_url('save_products'));?>
                        <input type="hidden" name="id" value="<?=$id;?>">
                        <div class="body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="SKU" name="sku" value="<?=$sku;?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Description" name="description" value="<?=$description;?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Unit Cost" name="unitcost" value="<?=$unitcost;?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="SRP" name="srp" value="<?=$srp;?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Category (e.g. Beverages, Snacks)" name="category" value="<?=$category;?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Reorder Level" name="reorder" value="<?=$reorder;?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Location (e.g. Shelf 1, Shelf 2)" name="location" value="<?=$location;?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    SAVE
                                </button>
                            </div>
                        </div>
                        <?=form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>