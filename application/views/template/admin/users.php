<?php $this->view('template/includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/users.js"></script>
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
                            Users List
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>User Image</th>
                                        <th>Name</th>
                                        <th>Total Amount</th>
                                        <th>Email ID</th>
                                        <th>Mobile Number</th>
                                        <th>Status</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>User Image</th>
                                        <th>Name</th>
                                        <th>Total Amount</th>
                                        <th>Email ID</th>
                                        <th>Mobile Number</th>
                                        <th>Status</th>
                                        <th>Controls</th>
                                    </tr>
                                </tfoot>
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
                                            <td><img class="img-responsive thumbnail" ng-src="<?= imagePath($row['profile_image'],'profile',$width = 70,$height=70);?>"></td>
                                            <td><?= ucfirst($row['firstname'])." ".ucfirst($row['middlename'])." ".ucfirst($row['lastname']);?></td>
                                            <td><?= $total_amount_invested; ?></td>
                                            <td><?= $row['email'];?></td>
                                            <td><?= $row['mobile'];?></td>
                                            <td><?= $row['status'] != '' ? $row['status']:'deactivate';?></td>
                                            <td>
                                                <!--<button type="button" class="btn btn-success waves-effect" onclick="window.open('<?php echo site_url(); ?>admin_users/view/<?php echo $row['userid']; ?>','_blank')">View</button>-->

                                                <button type="button" class="btn btn-primary waves-effect" ng-click="delete_user(<?php echo $row['userid']; ?>)">Delete</button>
                                                <button type="button" class="btn btn-danger waves-effect" onclick="window.open('<?= site_url(); ?>admin_users/view/<?= $row['userid']; ?>','_blank');">View</button>
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