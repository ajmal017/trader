<?php $this->view('template/includes/header'); ?>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/user_payment_details.js"></script>
<section class="content">
<?php 
if($payment_method == 'roi')
{
    $title = 'Return of interest details';
    $details = payment_details_view($view_userid,'return_of_interest');
}else if($payment_method == 'referral_income')
{
    $title = 'Referral income details';
    $details = payment_details_view($view_userid,'referral_income');
}else if($payment_method == 'loyality_income')
{
    $title = 'Loyality income details';
    $details = payment_details_view($view_userid,'loyality_income');
}
 ?>
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
                            <?= $title; ?>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Payout Amount Credit</th>
                                        <th>Payout Amount Debt</th>
                                        <th>Payment Description</th>
                                        <th>Payment status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <!--<tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Payout Amount Credit</th>
                                        <th>Payout Amount Debt</th>
                                        <th>Payment Description</th>
                                        <th>Payment status</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>-->
                                <tbody>
                                <?php $credit_bal = 0;$debit_bal = 0; ?>
                                <?php foreach ($details as $row ) { 
                                    
                                    if($row['status'] == 'generated')
                                    {
                                        $credit_bal = $credit_bal + $row['amount'];
                                    }else if($row['status'] == 'paid')
                                    {
                                        $debit_bal = $debit_bal + $row['amount'];
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $row['username'];?></td>
                                        <td><?= ($row['status'] == 'generated') ? $row['amount'] : '-'; ?></td>
                                        <td><?= ($row['status'] == 'paid') ? $row['amount'] : '-'; ?></td>
                                        <td><?= ($row['description'] !='') ? $row['description'] : '-'; ?></td>
                                        <td><?= $row['status'];?></td>
                                        <td><?= date("d-M-Y g:i:s A",strtotime($row['created_date']));?></td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td></td>
                                        <td><b>Total : <?= $credit_bal; ?></b></td>
                                        <td><b>Paid : <?= $debit_bal; ?></b></td>
                                        <td><b>Remaining Amount : <?= $credit_bal-$debit_bal; ?></b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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
