<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/libs/user_packages.js"></script>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">User Requested Packages List</a></li>
    </ol>
</div>
<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">User Requested Packages List</h4>

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
                        <th>User Name</th>
                        <th>Package Name</th>
                        <th>Package Amount</th>
                        <th>Payment Details</th>
                        <th>Payment Type</th>
                        <th>Total Amount</th>
                        <th>Purchase Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $user_package_list=getUserPackages(0,array('user_packages.status'=>'requested'));
                    foreach ($user_package_list as $row ) { 
                        ?>
                        <tr id="user-package-id-<?php echo $row['user_package_id']; ?>">
                            <td><?= $row['username'];?></td>
                            <td><?= $row['package_name'];?></td>
                            <td><?= $row['package_amount'];?></td>
                            <td><?= $row['payment_details'];?></td>
                            <td><?= $row['payment_type'];?></td>
                            <td><?= $row['package_amount']*$row['quantity'];?></td>
                            <td><?= $row['purchase_date'];?></td>
                            <td>
                                <a href="javascript:void(0);" class="deletePackage" ng-click="userPackageRequestAction(<?php echo $row['user_package_id']; ?>,<?php echo $row['userid']; ?>,'accepted')">Accept</a>
                                <a href="javascript:void(0);" class="deletePackage" ng-click="deleteUserPackageRequest(<?php echo $row['user_package_id']; ?>)">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>    
</div>
</div>
            </div>
        </div>
    <?php $this->load->view('admin/includes/footer'); ?>    
    </body>
</html>
