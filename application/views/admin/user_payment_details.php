<script src="<?php echo base_url(); ?>assets/admin/js/libs/user_payment_details.js"></script>
<div class="modal fade" id="release_payment" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Release Payment</h4>
            </div>
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-4">
                            <label>Username : </label>
                            <input type="text" class="form-control" ng-model="rp_username" disabled="disabled" />
                            <input type="hidden" class="form-control" ng-model="rp_userid">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Total Amount : </label>
                            <input type="text" class="form-control" ng-model="rp_total_amount" disabled="disabled" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Amount Paid : </label>
                            <input type="text" class="form-control" ng-model="rp_amount_paid" disabled="disabled" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Amount Remaining : </label>
                            <input type="text" class="form-control" ng-model="rp_amount_remaining" disabled="disabled"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Payment Description : </label>
                            <textarea cols="" rows=""  class="form-control" ng-model="rp_payment_desc"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Release Amount : </label>
                            <input type="text" class="form-control" ng-model="rp_release_amount" />
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-primary" ng-click="release_payment()" value="Release"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>    
    </div>
</div>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">User Payment Details</a></li>
    </ol>
</div>
<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">User Payment Details</h4>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <table id="table-basic" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Total Amount</th>
                        <th>Amount Paid</th>
                        <th>Amount Remaining</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $payment_details=user_payment_details(); ?>
                    <?php foreach ($payment_details as $row ) { 
                        ?>
                        <tr >
                            <td><?= $row['username'];?></td>
                            <td><?= $row['Total_Amount'];?></td>
                            <td><?= $row['Paid_Amount'];?></td>
                            <td><?= $row['Remaining_Amount'];?></td>
                            <td>
                                <button type="button" class="btn btn-danger" ng-click="release_payment_modal(<?= $row['userid'];?>)">Release Payment</button>
                                <a class="btn btn-primary" href="<?= site_url(); ?>/admin_user_payment_details/view/<?= $row['userid']; ?>" target="__blank__">View Payment Details</a>
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
