<?php $this->view('template/includes/header'); ?>
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
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Package Image</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Package Image</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php 
                                  $userid = $session_data['logged_in']['userid'];
                                  $wherein = "package_id NOT IN (select package_id from user_packages WHERE userid ='".$userid."' group by package_id)";
                                  $package_list=getPackages(0,array('package_status'=>'active'),$wherein); ?>
                                  <?php 
                                  if(count($package_list) > 0 ){
                                      foreach ($package_list as $row ) {  ?>
                                      <tr id="package-id-<?php echo $row['package_id']; ?>">
                                        <td class="package_name"><?= $row['package_name'];?></td>
                                        <td><img class="img-responsive thumbnail" ng-src="<?= imagePath($row['package_image'],'packages',100,100); ?>"/></td>
                                        <td><?= $row['package_amount'];?></td>
                                        <td><button type="button" class="btn btn-primary addPackage" ng-click="add_package_modal(<?php echo $row['package_id']; ?>)">BUY</button></td>
                                      </tr>
                                      <?php 
                                      }
                                  }else{ ?>
                                      <tr><td colspan="4">All Courses already purchased</td></tr>
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
<!-- Large Size -->
<div class="modal fade" id="package_payment" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Payment Details</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Payment Details : </label>
                            <input type="text" class="form-control" ng-model="payment_details"/>
                            <input type="hidden" class="form-control" ng-model="package_id">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Payment Type : </label>
                            <select class="form-control" ng-model="payment_type">
                                <option value="">Select</option>
                                <option value="paytm">Paytm</option>
                                <option value="bank">Bank</option>
                            </select>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" ng-click="add_package()">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<?php $this->view('template/includes/footer'); ?>
<script>
$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });
});
</script>