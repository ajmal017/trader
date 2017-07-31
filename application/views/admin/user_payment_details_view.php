<script src="<?php echo base_url(); ?>assets/admin/js/libs/user_payment_details.js"></script>

<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">User Payment Details View</a></li>
    </ol>
</div>
<div class="container-fluid-md">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">User Payment Details View</h4>

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
                        <th>Payout Amount Credit</th>
                        <th>Payout Amount Debt</th>
                        <th>Payment Description</th>
                        <th>Payment status</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $payment_details_view=user_payment_details_view($view_userid); ?>
                    <?php $credit_bal = 0;$debit_bal = 0; ?>
                    <?php foreach ($payment_details_view as $row ) { 
                        
                        if($row['status'] == 'generated')
                        {
                            $credit_bal = $credit_bal + $row['payout_amount'];
                        }else if($row['status'] == 'paid')
                        {
                            $debit_bal = $debit_bal + $row['payout_amount'];
                        }
                        ?>
                        <tr>
                            <td><?= $row['username'];?></td>
                            <td><?= ($row['status'] == 'generated') ? $row['payout_amount'] : '-'; ?></td>
                            <td><?= ($row['status'] == 'paid') ? $row['payout_amount'] : '-'; ?></td>
                            <td><?= ($row['payment_desc'] !='') ? $row['payment_desc'] : '-'; ?></td>
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
    <?php $this->load->view('admin/includes/footer'); ?>    
    </body>
</html>
