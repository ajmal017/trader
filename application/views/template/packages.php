<?php $this->view('template/includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ng/packages.js"></script>
<section class="content">
    <div class="container-fluid">
        <?php $this->view('template/includes/slider'); ?>
        <!--<div class="block-header">
            <h2>PACKAGES</h2>
        </div>-->
        <!-- Tabs With Custom Animations -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            Package List
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <button type="button" class="btn btn-default waves-effect" onclick="window.location.href='<?php echo site_url(); ?>packages/add_packages'">ADD PACKAGE</button>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Package Image</th>
                                        <th>Amount</th>
                                        <th>Purchase Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Package Image</th>
                                        <th>Amount</th>
                                        <th>Purchase Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $userPackagesList = getUserPackages($session_data['logged_in']['userid']);
                                    foreach($userPackagesList as $upl){ ?>
                                    <tr>
                                      <td><?= $upl['package_name']; ?></td>
                                      <td><img class="img-responsive thumbnail" ng-src="<?= imagePath($upl['package_image'],'packages',100,100); ?>" /></td>
                                      <td><?= $upl['package_amount']; ?></td>
                                      <td><?= $upl['purchase_date']; ?></td>
                                      <td><?= $upl['user_package_status']; ?></td>
                                      <td>
                                          <a class="btn btn-primary" href="<?= site_url(); ?>/packages/content?package_id=<?= $upl['package_id']; ?>">View </a>
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
<script>
$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });
});
</script>