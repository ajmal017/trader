<?php $this->view('template/includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/user_packages.js"></script>
<section class="content">
    <div class="container-fluid">
        <!--<div class="block-header">
            <h2>PACKAGES</h2>
        </div>-->

        <!-- Tabs With Custom Animations -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            User Packages Request
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Package Name</th>
                                        <th>Package Amount</th>
                                        <th>Payment Details</th>
                                        <th>Payment Type</th>
                                        <th>Total Amount</th>
                                        <th>Purchase Date</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Package Name</th>
                                        <th>Package Amount</th>
                                        <th>Payment Details</th>
                                        <th>Payment Type</th>
                                        <th>Total Amount</th>
                                        <th>Purchase Date</th>
                                        <th>Controls</th>
                                    </tr>
                                </tfoot>
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
</section>
<?php $this->view('template/includes/footer'); ?>
<!-- TinyMCE -->
<script src="<?= base_url(); ?>assets/template/plugins/tinymce/tinymce.js"></script>
<script>
$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '<?= base_url(); ?>assets/template/plugins/tinymce';
});
</script>