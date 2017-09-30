<?php $this->view('template/includes/header'); ?>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/user_payment_details.js"></script>
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
                            Return of interest details
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>Total Amount</th>
                                        <th>Amount Paid</th>
                                        <th>Amount Remaining</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>Total Amount</th>
                                        <th>Amount Paid</th>
                                        <th>Amount Remaining</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php $details=roi_details();?>
                                <?php foreach ($details as $row ) { 
                                    ?>
                                    <tr >
                                        <td><?= $row['userid'];?></td>
                                        <td><?= $row['username'];?></td>
                                        <td><?= $row['Total_Amount'];?></td>
                                        <td><?= $row['Paid_Amount'];?></td>
                                        <td><?= $row['Remaining_Amount'];?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger waves-effect" ng-click="release_payment_modal(<?= $row['userid'];?>,'roi')">Release Payment</button>
                                            <a class="btn btn-primary waves-effect" href="<?= site_url(); ?>admin_user_payment_details/view/roi/<?= $row['userid']; ?>" target="__blank__">View Details</a>
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
<!-- Large Size -->
<div class="modal fade" id="release_payment" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Release Payment</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Username : </label>
                            <input type="text" class="form-control" ng-model="rp_username" disabled="disabled" />
                            <input type="hidden" class="form-control" ng-model="rp_userid">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Total Amount : </label>
                            <input type="text" class="form-control" ng-model="rp_total_amount" disabled="disabled" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Amount Paid : </label>
                            <input type="text" class="form-control" ng-model="rp_amount_paid" disabled="disabled" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Amount Remaining : </label>
                            <input type="text" class="form-control" ng-model="rp_amount_remaining" disabled="disabled" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Payment Description : </label>
                            <textarea cols="" rows=""  class="form-control" ng-model="rp_payment_desc"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Release Amount : </label>
                            <input type="text" class="form-control" ng-model="rp_release_amount"/>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" ng-click="release_payment('roi')">SAVE CHANGES</button>
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