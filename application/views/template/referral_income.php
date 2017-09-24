<?php $this->view('template/includes/header'); ?>
<script src="<?php echo base_url(); ?>assets/js/ng/payment_details.js"></script>
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
                            Referral Income
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $referral_income = get_referral_income($session_data['logged_in']['userid']);
                                    foreach($referral_income as $row){ ?>
                                    <tr>
                                      <td><?= $row['amount']; ?></td>
                                      <td><?= $row['status']; ?></td>
                                      <td><?= $row['created_date']; ?></td>
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