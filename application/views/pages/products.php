<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><?=$title;?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="main"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Products List</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Item List </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-menu"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="<?=base_url('manage_products/0');?>">Add New</a></li>
                                        <!-- <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li> -->
                                    </ul>
                                </li>
                                <!-- <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SKU</th>
                                            <th>DESCRIPTION</th>
                                            <th>UNITCOST</th>
                                            <th>SRP</th>
                                            <th>CATEGORY</th>
                                            <th>REORDER</th>
                                            <th>LOCATION</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SKU</th>
                                            <th>DESCRIPTION</th>
                                            <th>UNITCOST</th>
                                            <th>SRP</th>
                                            <th>CATEGORY</th>
                                            <th>REORDER</th>
                                            <th>LOCATION</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach($items as $item){
                                            echo "<tr>";
                                            echo "<td>".$item['sku']."</td>";
                                            echo "<td>".$item['description']."</td>";
                                            echo "<td>".$item['unitcost']."</td>";
                                            echo "<td>".$item['sellingprice']."</td>";
                                            echo "<td>".$item['category']."</td>";
                                            echo "<td>".$item['reorder']."</td>";
                                            echo "<td>".$item['location']."</td>";
                                            echo "<td><a class='btn btn-primary btn-sm'>Edit</a> <a class='btn btn-danger btn-sm'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>