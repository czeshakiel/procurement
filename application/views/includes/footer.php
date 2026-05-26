
<!-- Jquery Core Js -->
<script src="<?=base_url('design/assets/bundles/libscripts.bundle.js');?>"></script>

<!-- Plugin Js-->
<script src="<?=base_url('design/assets/bundles/dataTables.bundle.js');?>"></script>

<!-- Jquery Page Js -->
<script src="<?=base_url('design/assets/js/template.js');?>"></script>

<script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });        
    });

    $('.addUser').on('click', function(){
        document.getElementById('user_name').value = "";
        document.getElementById('user_id').value = "";
        document.getElementById('user_pass').value = "";
        document.getElementById('userid').value = "";
    });
    $('.editUser').on('click', function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('user_name').value = id[0];
        document.getElementById('user_id').value = id[1];
        document.getElementById('user_pass').value = id[2];
        document.getElementById('userid').value = id[3];
    });
    $('.addUnit').on('click', function(){
        document.getElementById('unit_description').value = "";   
        document.getElementById('unit_id').value = "";
    });
    $('.editUnit').on('click', function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('unit_description').value = id[0];
        document.getElementById('unit_id').value = id[1];
    });

    $('.addSupplier').on('click', function(){
        var id=$(this).data('id');
        document.getElementById('supplier_name').value = "";   
        document.getElementById('supplier_code').value = id;
        document.getElementById('supplier_status').value = "";
        document.getElementById('supplier_id').value = "";
    });
    $('.editSupplier').on('click', function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('supplier_name').value = id[0];
        document.getElementById('supplier_code').value = id[1];
        document.getElementById('supplier_status').value = id[2];
        document.getElementById('supplier_id').value = id[3];
    });

    $('.addStock').on('click', function(){
        var id=$(this).data('id');
        document.getElementById('stock_description').value = "";   
        document.getElementById('stock_code').value = id;
        document.getElementById('stock_unit').value = "";        
        document.getElementById('stock_id').value = "";        
    });
    $('.editStock').on('click', function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('stock_description').value = id[0];
        document.getElementById('stock_code').value = id[1];
        document.getElementById('stock_unit').value = id[2];
        document.getElementById('stock_id').value = id[3];
    });
    $('.createproject').on('click', function(){
        document.getElementById('project_id').value = "";   
        document.getElementById('project_name').value = "";
        document.getElementById('project_contractor').value = "";        
        document.getElementById('project_start_date').value = "";
        document.getElementById('project_end_date').value = "";
        document.getElementById('project_approved_amount').value = "";        
    });
    $('.editproject').on('click', function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('project_id').value = id[0];
        document.getElementById('project_name').value = id[1];
        document.getElementById('project_contractor').value = id[2];
        document.getElementById('project_start_date').value = id[3];
        document.getElementById('project_end_date').value = id[4];
        document.getElementById('project_approved_amount').value = id[5];
    });
    $('.createRequest').on('click', function(){
        var id=$(this).data('id');
        document.getElementById('request_project_id').value = id;        
    });
</script>

</body>
</html>