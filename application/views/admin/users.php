<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<script src="<?php echo base_url(); ?>assets/admin/js/libs/users.js"></script>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">User master</a></li>
    </ol>
</div>
<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">List Of Users</h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <table id="table-basic" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Total Amount</th>
                            <th>Email ID</th>
                            <th>Mobile Number</th>
                            <th>Status</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $users_list=getUserInfo();
                    foreach ($users_list as $row ) {
                    $total_amount_invested = 0;
                    foreach ($row['package_list'] as $row1) {
                        $total_amount_invested = $total_amount_invested + $row1['package_amount']*$row1['quantity'];
                     } 
                        ?>
                        <tr id="user-id-<?php echo $row['userid']; ?>">
                            <td><?= $row['username'];?></td>
                            <td><?= ucfirst($row['firstname'])." ".ucfirst($row['middlename'])." ".ucfirst($row['lastname']);?></td>
                            <td><?= $total_amount_invested; ?></td>
                            <td><?= $row['email'];?></td>
                            <td><?= $row['mobile'];?></td>
                            <td><?= $row['status'] != '' ? $row['status']:'deactivate';?></td>
                            <td>
                                <a href="<?php echo site_url(); ?>/admin_users/view/<?php echo $row['userid']; ?>" target="_BLANK_">View</a> | 
                                <a href="javascript:void(0);" ng-click="delete_users(<?php echo $row['userid']; ?>)">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>    
</div>
</div>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/bootstrap-wysihtml5.js"></script>
<script>
    jQuery(function ($) {
        $('#wysiwyg').wysihtml5({
            stylesheets: ['assets/plugins/bootstrap-wysihtml5/css/wysiwyg-color.css']
        });
        $('.wysihtml5-toolbar .btn-default').removeClass('btn-default').addClass('btn-white');
    });
</script>
            </div>
        </div>
    <?php $this->load->view('admin/includes/footer'); ?>    
    </body>
</html>